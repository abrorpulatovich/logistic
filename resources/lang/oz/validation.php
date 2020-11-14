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

    'accepted'        => ':attribute майдонини қабул қилишингиз керак.',
    'active_url'      => ':attribute майдонига нотўғри URL киритилди.',
    'after'           => ':attribute майдонида сана :date дан кейин бўлиши керак.',
    'after_or_equal'  => ':attribute майдонида сана :date га тенг ёки ундан кейин бўлиши керак.',
    'alpha'           => ':attribute майдони фақат ҳарфларни қабул қилиши мумкин.',
    'alpha_dash'      => ':attribute майдони фақат ҳарфлар,  сонлар ва чизиқчаларни қабул қилиши мумкин.',
    'alpha_num'       => ':attribute майдони фақат ҳарфлар ва сонларни қабул қилиши мумкин.',
    'array'           => ':attribute майдони рўйхатдан иборат бўлиши керак.',
    'before'          => ':attribute майдонида сана :date гача бўлиши керак.',
    'before_or_equal' => ':attribute майдонида сана :date га тенг ёки ундан олдин бўлиши керак.',
    'between'         => [
        'numeric' => ':attribute майдонининг қиймати :min ва :max орасида бўлиши керак.',
        'file'    => ':attribute даги файлнинг ҳажми :min ва :max килобайт орасида бўлиши керак.',
        'string'  => ':attribute даги белгилар сони :min ва :max орасида бўлиши керак.',
        'array'   => ':attribute даги элементлар сони :min ва :max орасида бўлиши керак.',
    ],
    'boolean'        => ':attribute майдони фақат мантиқий қийматни қабул қилади.',
    'confirmed'      => ':attribute майдони тасдиқлангани билан мос келмади.',
    'date'           => ':attribute сана эмас.',
    'date_equals'    => ':attribute сана :date га тенг бўлиши керак.',
    'date_format'    => ':attribute майдони :format форматга мос келмади.',
    'different'      => ':attribute ва :other майдонлари фарқли бўлиши керак.',
    'digits'         => ':attribute :digits рақамдан иборат бўлиши керак.',
    'digits_between' => ':attribute майдони узунлиги :min ва :max орасида бўлиши керак.',
    'dimensions'     => ':attribute майдонидаги тасвир тўғри келмайдиган ўлчамларга эга.',
    'distinct'       => ':attribute майдони такрорланувчи қийматлардан иборат.',
    'email'          => ':attribute майдони ҳақиқий электрон почта манзили бўлиши керак.',
    'ends_with'      => ':attribute майдони қуйидаги қийматларнинг бири билан тугаши керак: :values.',
    'exists'         => ':attribute майдони учун танланган қиймат нотўғри.',
    'file'           => ':attribute майдони файл бўлиши керак.',
    'filled'         => ':attribute майдони тўлдирилиши шарт.',
    'gt'             => [
        'numeric' => ':attribute майдони :value дан катта бўлиши керак.',
        'file'    => ':attribute файл ҳажми :value килобайтдан катта бўлиши керак.',
        'string'  => ':attribute даги белгилар сони :value дан катта бўлиши керак.',
        'array'   => ':attribute даги элементлар сони :value дан катта бўлиши керак.',
    ],
    'gte' => [
        'numeric' => ':attribute майдони :value дан катта ёки тенг бўлиши керак.',
        'file'    => ':attribute файл ҳажми :value килобайтдан катта ёки тенг бўлиши керак.',
        'string'  => ':attribute даги белгилар сони :value дан катта ёки тенг бўлиши керак.',
        'array'   => ':attribute даги элементлар сони :value дан катта ёки тенг бўлиши керак.',
    ],
    'image'    => ':attribute майдони тасвир (расм) бўлиши керак.',
    'in'       => ':attribute майдони учун танланган қиймат хато.',
    'in_array' => ':attribute майдониning қиймати :other да мавжуд эмас.',
    'integer'  => ':attribute майдони бутун сон бўлиши керак.',
    'ip'       => ':attribute майдони ҳақиқий IP манзил бўлиши керак.',
    'ipv4'     => ':attribute майдони ҳақиқий IPv4 манзил бўлиши керак.',
    'ipv6'     => ':attribute майдони ҳақиқий IPv6 манзил бўлиши керак.',
    'json'     => ':attribute майдони JSON қатори бўлиши керак.',
    'lt'       => [
        'numeric' => ':attribute майдони :value дан кичик бўлиши керак.',
        'file'    => ':attribute даги файл ҳажми :value килобайтдан кичик бўлиши керак.',
        'string'  => ':attribute даги белгилар сони :value дан кичик бўлиши керак.',
        'array'   => ':attribute даги элементлар сони :value дан кичик бўлиши керак.',
    ],
    'lte' => [
        'numeric' => ':attribute майдони :value дан кичик ёки тенг бўлиши керак.',
        'file'    => ':attribute файл ҳажми :value килобайтдан кичик ёки тенг бўлиши керак.',
        'string'  => ':attribute даги белгилар сони :value дан кичик ёки тенг бўлиши керак.',
        'array'   => ':attribute даги элементлар сони :value дан кичик ёки тенг бўлиши керак.',
    ],
    'max' => [
        'numeric' => ':attribute нинг қиймати :max дан ошмаслиги керак.',
        'file'    => ':attribute даги файлнинг ҳажми :max килобайтдан ошмаслиги керак.',
        'string'  => ':attribute нинг белгилар сони :max тадан ошмаслиги керак.',
        'array'   => ':attribute ning elmentlar soni :max tadan oshmasligi kerak.',
    ],
    'mimes'     => ':attribute даги файл қуйидаги турлардан бири бўлиши керак: :values.',
    'mimetypes' => ':attribute даги файл қуйидаги турлардан бири бўлиши керак: :values.',
    'min'       => [
        'numeric' => ':attribute нинг қиймати :min дан кам бўлмаслиги керак.',
        'file'    => ':attribute даги файлнинг ҳажми :min килобайтдан кам бўлмаслиги керак.',
        'string'  => ':attribute даги белгилар сони :min тадан кам бўлмаслиги керак.',
        'array'   => ':attribute даги элментлар сони :min тадан кам бўлмаслиги керак.',
    ],
    'not_in'               => ':attribute учун танланган қиймат хато.',
    'not_regex'            => ':attribute учун танланган формат хато.',
    'numeric'              => ':attribute майдони сон бўлиши керак.',
    'password'             => 'Нотўғри парол.',
    'present'              => ':attribute майдони кўрсатилиши керак.',
    'regex'                => ':attribute майдони хато форматда.',
    'required'             => ':attribute майдони тўлдирилиши шарт.',
    'required_if'          => ':other майдони :value га тенг бўлса, :attribute майдони тўлдирилиши шарт.',
    'required_unless'      => ':other майдони :values га тенг бўлмаса, :attribute майдони тўлдирилиши шарт.',
    'required_with'        => ':values кўрсатилган бўлса, :attribute майдони тўлдирилиши шарт.',
    'required_with_all'    => ':values кўрсатилган бўлса, :attribute майдони тўлдирилиши шарт.',
    'required_without'     => ':values кўрсатилмаган бўлса, :attribute майдони тўлдирилиши шарт.',
    'required_without_all' => ':values лардан ҳеч бири кўрсатилмаган бўлса, :attribute майдони тўлдирилиши шарт.',
    'same'                 => ':attribute нинг қиймати :other билан бир хил бўлиши керак.',
    'size'                 => [
        'numeric' => ':attribute майдони қиймати :size га тенг бўлиши керак.',
        'file'    => ':attribute даги файлнинг ҳажми :size килобайтга тенг бўлиши керак.',
        'string'  => ':attribute даги белгилар сони :size га тенг бўлиши керак.',
        'array'   => ':attribute даги элментлар сони :size га тенг бўлиши керак.',
    ],
    'starts_with' => ':attribute майдони қуйидаги қийматлардан бири билан бошланиши керак: :values.',
    'string'      => ':attribute майдони қатор бўлиши керак.',
    'timezone'    => ':attribute нинг қиймати мавжуд вақт минтақаси бўлиши керак.',
    'unique'      => ':attribute майдонининг бундай қиймати мавжуд.  Илтимос бошқа қиймат киритинг.',
    'uploaded'    => ':attribute майдонини юклаш муваффақиятли амалга ошмади.',
    'url'         => ':attribute майдони нотўғри форматга эга.',
    'uuid'        => ':attribute майдони тўғри UUID қийматга эга бўлиши керак.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        "status" => "Ҳолати",
        "name_uz" => "Номланиши uz",
        "name_oz" => "Номланиши уз",
        "name_en" => "Номланиши en",
        "name_ru" => "Номланиши ru",
        "slug_uz" => "Урлда кўриниши uz",
        "slug_oz" => "Урлда кўриниши уз",
        "slug_en" => "Урлда кўриниши en",
        "slug_ru" => "Урлда кўриниши ru",
        "breadcrumb_bg_image" => "Категория расми",
        "c_order" => "Тартиби",
        'title_uz' => 'Сарлавҳа uz',
        'title_en' => 'Сарлавҳа en',
        'title_ru' => 'Сарлавҳа ru',
        'title_oz' => 'Сарлавҳа oz',
        'short_desc_uz' => 'Қизқача мазмуни uz',
        'short_desc_en' => 'Қизқача мазмуни en',
        'short_desc_ru' => 'Қизқача мазмуни ru',
        'short_desc_oz' => 'Қизқача мазмуни oz',
        'desc_uz' => 'Мазмуни uz',
        'desc_en' => 'Мазмуни en',
        'desc_ru' => 'Мазмуни ru',
        'desc_oz' => 'Мазмуни oz',
        'image' => 'Расм',
        'slug' => "УРЛ манзилида кўриш",
        'name' => 'Номланиши',
        'opinion' => 'Биз ҳақимизда фикри',
        'username'              => '사용자 이름',
        'email'                 => '이메일',
        'first_name'            => '이름',
        'last_name'             => '성',
        'password'              => '비밀번호',
        'password_confirmation' => '비밀번호 확인',
        'city'                  => '도시',
        'country'               => '국가',
        'address'               => '주소',
        'phone'                 => '전화 번호',
        'mobile'                => '휴대 전화 번호',
        'age'                   => '나이',
        'sex'                   => '성별',
        'gender'                => '성별',
        'day'                   => '일',
        'month'                 => '달',
        'year'                  => '년',
        'hour'                  => '시간',
        'minute'                => '분',
        'second'                => '두 번째',
        'title'                 => '제목',
        'content'               => '내용',
        'description'           => '설명',
        'excerpt'               => '발췌',
        'date'                  => '날짜',
        'time'                  => '시간',
        'available'             => '사용 가능',
        'size'                  => '크기',
        'message'               => '메시지'
    ],
];
