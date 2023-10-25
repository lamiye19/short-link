<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Helper\Helper;
use App\Models\Link;
use App\Models\LinkClick;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::where('user_id', auth()->user()->id)->get();
        return view('pages.links.liste', compact('links'));
    }

    public function store(Request $request)
    {
        // Generate a random back-half or a slug
        if ($request->uuid != '') {
            $request->merge([
                'uuid' => Helper::slug($request->uuid),
            ]);
        } else {
            $uuid = Str::random(10);
            $request->merge([
                'uuid' => Helper::slug($uuid),
            ]);
        }

        $request->merge([
            'user_id' => auth()->user()->id,
        ]);

        $validate = Validator::make($request->all(), [
            'long' => 'required|active_url|not_regex:{^'. url('/') . '}',
            'uuid' => 'required|unique:links,uuid',
            'user_id' => 'required|exists:users,id',
        ]);

        if (!$validate->fails()) {

            $request->merge([
                'short' => url($request->uuid),
            ]);

            $link = Link::create($request->all());

            // Get title from link if it is not set
            if ($request->title == '') {
                $goutteClient = new Client();
                try {
                    $crawler = $goutteClient->request('GET', $link->long);

                    // Get the title
                    $title = $crawler->filter('title')->first()->text();
                    $link->update([
                        'title' => $title,
                    ]);
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }


            return redirect()->route('links')->with(['success' => "Short link created."]);
        } else {

            return back()->withErrors($validate);
        }
    }

    public function update(Request $request, $uuid)
    {
        $link = Link::where('uuid', $uuid)->first();

        if (is_null($link)) {
            return redirect()->route('links')->with(['error' => "Short link not found."]);
        }

        if ($link->user_id != auth()->user()->id) {
            return redirect()->route('links')->with(['error' => "You cannot edit other's link."]);
        }

        if ($request->uuid != $link->uuid) {
            if ($request->uuid != '') {
                $request->merge([
                    'uuid' => Helper::slug($request->uuid),
                ]);
            } else {
                $uuid = Str::random(10);
                $request->merge([
                    'uuid' => Helper::slug($uuid),
                ]);
            }

            $validate = Validator::make($request->all(), [
                'uuid' => 'unique:links,uuid',
            ]);
            if ($validate->fails()) {
                return back()->withErrors($validate);
            }
        }

        $request->merge([
            'short' => url($request->uuid)
        ]);

        $link->update($request->all());


        return redirect()->route('links')->with(['success' => "Short link updated."]);
    }

    public function create()
    {
        return view('pages.links.create');
    }

    public function get_link(Request $request, $uuid)
    {
        $link = Link::where('uuid', $uuid)->firstOrFail();

        if (!is_null($link)) {
            $country = null;
            $ip = $request->ip();
            $ipv6 = $request->header('x-forwarded-for');

            if ($ip != '') {
                $country = Helper::getCountryFromIP($ip);
            }

            $count = LinkClick::create([
                "ip" => $ip,
                "ipv6" => $ipv6,
                "country" => $country,
                "link_id" => $link->id,
            ]);

            return redirect($link->long);
        } else {
            return redirect()->route('404')->with(['error' => "Short link not found."]);
        }
    }
}
