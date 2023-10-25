<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Le champ :attribute doit être accepté.',
    'active_url' => 'Le champ :attribute n\'est pas un URL valide.',
    'after' => 'Le champ :attribute doit être une date après :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Le champ :attribute ne doit contenir que des lettres.',
    'alpha_dash' => 'Le champ :attribute ne doit contenir que des lettres, nombres, tirets et traits de soulignement.',
    'alpha_num' => 'Le champ :attribute ne doit contenir que des lettres and nombres.',
    'array' => 'Le champ :attribute doit être un tableau.',
    'before' => 'Le champ :attribute doit être une date avant :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Le champ :attribute doit être entre :min et :max.',
        'file' => 'Le champ :attribute doit être entre :min et :max kilobytes.',
        'string' => 'Le champ :attribute doit être entre :min et :max caractères.',
        'array' => 'Le champ :attribute doit avoir entre :min et :max éléments.',
    ],
    'boolean' => 'Le champ :attribute doit être true ou false.',
    'confirmed' => 'La confirmation du champ :attribute ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrecte.',
    'date' => 'Le champ :attribute n\'est pas une date valide.',
    'date_equals' => 'Le champ :attribute doit être une date égale à :date.',
    'date_format' => 'Le champ :attribute ne correspond pas au format :format.',
    'different' => 'Le champ :attribute and :other doit être different.',
    'digits' => 'Le champ :attribute doit contenir :digits chiffres.',
    'digits_between' => 'Le champ :attribute doit contenir entre :min et :max chiffres.',
    'dimensions' => 'Le champ :attribute a des dimensions d\'image invalide.',
    'distinct' => 'Le champ :attribute a un doublon.',
    'email' => 'Le champ :attribute doit être une adresse email valide.',
    'ends_with' => 'La valeur du champ :attribute doit terminer avec l\'une des valeurs suivantes: :values.',
    'exists' => 'La valeur choisie pour le champ :attribute n\'est pas valide.',
    'file' => 'Le champ :attribute doit contenir un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le champ :attribute doit être supérieur à :value.',
        'file' => 'Le champ :attribute doit être supérieur à :value kilobytes.',
        'string' => 'Le champ :attribute doit être supérieur à :value caractères.',
        'array' => 'Le champ :attribute doit contenir plus que :value éléments.',
    ],
    'gte' => [
        'numeric' => 'Le champ :attribute doit être supérieur ou égal à :value.',
        'file' => 'Le champ :attribute doit être supérieur ou égal à :value kilobytes.',
        'string' => 'Le champ :attribute doit être supérieur ou égal à :value caractères.',
        'array' => 'Le champ :attribute doit contenir :value éléments or more.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'La valeur choisie pour le champ :attribute est invalide.',
    'in_array' => 'La valeur du champ :attribute n\'existe pas dans :other.',
    'integer' => 'Le champ :attribute doit être un entier.',
    'ip' => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le champ :attribute doit être a JSON valide.',
    'lt' => [
        'numeric' => 'Le champ :attribute doit être inférieur à :value.',
        'file' => 'Le champ :attribute doit être inférieur à :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur à :value caractères.',
        'array' => 'Le champ :attribute doit contenir moins de :value éléments.',
    ],
    'lte' => [
        'numeric' => 'Le champ :attribute doit être inférieur ou égal à :value.',
        'file' => 'Le champ :attribute doit être inférieur ou égal à :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur ou égal à :value caractères.',
        'array' => 'Le champ :attribute ne doit contenir plus de :value éléments.',
    ],
    'max' => [
        'numeric' => 'Le champ :attribute ne doit pas être supérieur à :max.',
        'file' => 'Le champ :attribute ne doit pas être supérieur à :max kilobytes.',
        'string' => 'Le champ :attribute ne doit pas être supérieur à :max caractères.',
        'array' => 'Le champ :attribute doit avoir au plus :max éléments.',
    ],
    'mimes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'mimetypes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'Le champ :attribute doit être au minimum :min.',
        'file' => 'La taille de :attribute doit être au minimum :min kb.',
        'string' => 'Le :attribute doit contenir au moins :min caractères.',
        'array' => 'Le :attribute doit avoir au moins :min éléments.',
    ],
    'multiple_of' => 'Le champ :attribute doit être a multiple of :value.',
    'not_in' => 'The selected :attribute est invalide.',
    'not_regex' => 'Le champ :attribute format est invalide.',
    'numeric' => ':attribute doit être un nombre.',
    'password' => 'le mot de passe est incorrecte.',
    'present' => 'Le champ :attribute field doit être present.',
    'regex' => 'le format :attribute est invalide.',
    'required' => 'Ce champs est obligatoire',
    'required_if' => 'Le champ :attribute est requis quand le champ :other est :value.',
    'required_unless' => 'Le champ :attribute field is required unless :other is in :values.',
    'required_with' => 'Le champ :attribute field is required when :values is present.',
    'required_with_all' => 'Le champ :attribute field is required when :values are present.',
    'required_without' => 'Le champ :attribute field is required when :values is not present.',
    'required_without_all' => 'Le champ :attribute field is required when none of :values are present.',
    'prohibited' => 'Le champ :attribute est interdit.',
    'prohibited_if' => 'Le champ :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'Le champ :attribute field is prohibited unless :other is in :values.',
    'same' => 'Le champ :attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => 'Le champ :attribute doit être :size.',
        'file' => 'Le champ :attribute doit être :size kilobytes.',
        'string' => 'Le champ :attribute doit être :size caractères.',
        'array' => 'Le champ :attribute doit contenir :size éléments.',
    ],
    'starts_with' => 'Le champ :attribute doit commencer avec l\'une des valeurs suivantes: :values.',
    'string' => 'Le champ :attribute doit être a string.',
    'timezone' => 'Le champ :attribute doit être a valide timezone.',
    'unique' => 'La valeur du champ :attribute existe déjà.',
    'uploaded' => 'Echec de chargement du champ :attribute.',
    'url' => 'Le champ :attribute doit contenir un URL valide.',
    'uuid' => 'Le champ :attribute doit être un valide UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],


    'custom' => [
        /* 'emailError' => [
            'required' => "Veuillez utiliser votre email d'enregistrement en tant que maître de stage",
        ], */

        'email' => [
            'unique' => 'L\'email est déjà utilisé.',
            'exists' => 'Cet email n\'exixte pas dans nos sauvegardes'
        ],

        'debut' => [
            'after' => 'La date de début doit être une date à partir d\'aujourd\'hui',
        ],
        'appointment' => [
            'after' => 'La date de rendez-vous doit être une date après aujourd\'hui',
        ],
        'date_fin_option' => [
            'required_if' => 'La date de fin option est requis quand le champ :other est :value.',
        ],
        'password' => [
            'confirmed' => 'Le mot de passe de confirmation ne correspond pas.',
        ]
],
];
