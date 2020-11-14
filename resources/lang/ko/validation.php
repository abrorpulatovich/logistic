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

    'accepted'        => ':attribute을(를) 동의해야 합니다.',
    'active_url'      => ':attribute은(는) 유효한 URL이 아닙니다.',
    'after'           => ':attribute은(는) :date 이후 날짜여야 합니다.',
    'after_or_equal'  => ':attribute은(는) :date 이후 날짜이거나 같은 날짜여야 합니다.',
    'alpha'           => ':attribute은(는) 문자만 포함할 수 있습니다.',
    'alpha_dash'      => ':attribute은(는) 문자, 숫자, 대쉬(-), 밑줄(_)만 포함할 수 있습니다.',
    'alpha_num'       => ':attribute은(는) 문자와 숫자만 포함할 수 있습니다.',
    'array'           => ':attribute은(는) 배열이어야 합니다.',
    'before'          => ':attribute은(는) :date 이전 날짜여야 합니다.',
    'before_or_equal' => ':attribute은(는) :date 이전 날짜이거나 같은 날짜여야 합니다.',
    'between'         => [
        'numeric' => ':attribute의 값은 :min에서 :max 사이여야 합니다.',
        'file'    => ':attribute의 용량은 :min에서 :max 킬로바이트 사이여야 합니다.',
        'string'  => ':attribute의 길이는 :min에서 :max 문자 사이여야 합니다.',
        'array'   => ':attribute의 항목 수는 :min에서 :max 개의 항목이 있어야 합니다.',
    ],
    'boolean'        => ':attribute은(는) true 또는 false 이어야 합니다.',
    'confirmed'      => ':attribute 확인 항목이 일치하지 않습니다.',
    'date'           => ':attribute은(는) 유효한 날짜가 아닙니다.',
    'date_equals'    => ':attribute은(는) :date과(와) 같은날짜여야합니다.',
    'date_format'    => ':attribute이(가) :format 형식과 일치하지 않습니다.',
    'different'      => ':attribute와(과) :other은(는) 서로 달라야 합니다.',
    'digits'         => ':attribute은(는) :digits 자리 숫자여야 합니다.',
    'digits_between' => ':attribute)은(는) :min에서 :max 자리 사이여야 합니다.',
    'dimensions'     => ':attribute은(는) 올바르지 않는 이미지 크기입니다.',
    'distinct'       => ':attribute 필드에 중복된 값이 있습니다.',
    'email'          => ':attribute은(는) 유효한 이메일 주소여야 합니다.',
    'ends_with'      => ':attribute은(는) 다음 중 하나로 끝나야 합니다: :values.',
    'exists'         => '선택된 :attribute은(는) 올바르지 않습니다.',
    'file'           => ':attribute은(는) 파일이어야 합니다.',
    'filled'         => ':attribute 필드는 값이 있어야 합니다.',
    'gt'             => [
        'numeric' => ':attribute의 값은 :value보다 커야 합니다.',
        'file'    => ':attribute의 용량은 :value킬로바이트보다 커야 합니다.',
        'string'  => ':attribute의 길이는 :value보다 길어야 합니다.',
        'array'   => ':attribute의 항목 수는 :value개 보다 많아야 합니다.',
    ],
    'gte' => [
        'numeric' => ':attribute의 값은 :value보다 같거나 커야 합니다.',
        'file'    => ':attribute의 용량은 :value킬로바이트보다 같거나 커야 합니다.',
        'string'  => ':attribute의 길이는 :value보다 같거나 길어야 합니다.',
        'array'   => ':attribute의 항목 수는 :value개 보다 같거나 많아야 합니다.',
    ],
    'image'    => ':attribute은(는) 이미지여야 합니다.',
    'in'       => '선택된 :attribute은(는) 올바르지 않습니다.',
    'in_array' => ':attribute 필드는 :other에 존재하지 않습니다.',
    'integer'  => ':attribute은(는) 정수여야 합니다.',
    'ip'       => ':attribute은(는) 유효한 IP 주소여야 합니다.',
    'ipv4'     => ':attribute은(는) 유효한 IPv4 주소여야 합니다.',
    'ipv6'     => ':attribute은(는) 유효한 IPv6 주소여야 합니다.',
    'json'     => ':attribute은(는) JSON 문자열이어야 합니다.',
    'lt'       => [
        'numeric' => ':attribute의 값은 :value보다 작아야 합니다.',
        'file'    => ':attribute의 용량은 :value킬로바이트보다 작아야 합니다.',
        'string'  => ':attribute의 길이는 :value보다 짧아야 합니다.',
        'array'   => ':attribute의 항목 수는 :value개 보다 작아야 합니다.',
    ],
    'lte' => [
        'numeric' => ':attribute의 값은 :value보다 같거나 작아야 합니다.',
        'file'    => ':attribute의 용량은 :value킬로바이트보다 같거나 작아야 합니다.',
        'string'  => ':attribute의 길이는 :value보다 같거나 짧아야 합니다.',
        'array'   => ':attribute의 항목 수는 :value개 보다 같거나 작아야 합니다.',
    ],
    'max' => [
        'numeric' => ':attribute은(는) :max보다 클 수 없습니다.',
        'file'    => ':attribute은(는) :max킬로바이트보다 클 수 없습니다.',
        'string'  => ':attribute은(는) :max자보다 클 수 없습니다.',
        'array'   => ':attribute은(는) :max개보다 많을 수 없습니다.',
    ],
    'mimes'     => ':attribute은(는) 다음의 파일 형식이어야 합니다: :values.',
    'mimetypes' => ':attribute은(는) 다음의 파일 형식이어야 합니다: :values.',
    'min'       => [
        'numeric' => ':attribute은(는) 최소한 :min이어야 합니다.',
        'file'    => ':attribute은(는) 최소한 :min킬로바이트이어야 합니다.',
        'string'  => ':attribute은(는) 최소한 :min자이어야 합니다.',
        'array'   => ':attribute은(는) 최소한 :min개의 항목이 있어야 합니다.',
    ],
    'not_in'               => '선택된 :attribute이(가) 올바르지 않습니다.',
    'not_regex'            => ':attribute의 형식이 올바르지 않습니다.',
    'numeric'              => ':attribute은(는) 숫자여야 합니다.',
    'password'             => '비밀번호가 잘못되었습니다.',
    'present'              => ':attribute 필드가 있어야 합니다.',
    'regex'                => ':attribute 형식이 올바르지 않습니다.',
    'required'             => ':attribute 필드는 필수입니다.',
    'required_if'          => ':other이(가) :value 일 때 :attribute 필드는 필수입니다.',
    'required_unless'      => ':other이(가) :values에 없다면 :attribute 필드는 필수입니다.',
    'required_with'        => ':values이(가) 있는 경우 :attribute 필드는 필수입니다.',
    'required_with_all'    => ':values이(가) 모두 있는 경우 :attribute 필드는 필수입니다.',
    'required_without'     => ':values이(가) 없는 경우 :attribute 필드는 필수입니다.',
    'required_without_all' => ':values이(가) 모두 없는 경우 :attribute 필드는 필수입니다.',
    'same'                 => ':attribute와(과) :other은(는) 일치해야 합니다.',
    'size'                 => [
        'numeric' => ':attribute은(는) :size (이)여야 합니다.',
        'file'    => ':attribute은(는) :size킬로바이트여야 합니다.',
        'string'  => ':attribute은(는) :size자여야 합니다.',
        'array'   => ':attribute은(는) :size개의 항목을 포함해야 합니다.',
    ],
    'starts_with' => ':attribute은(는) :values 중 하나로 시작해야 합니다.',
    'string'      => ':attribute은(는) 문자열이어야 합니다.',
    'timezone'    => ':attribute은(는) 올바른 시간대 이어야 합니다.',
    'unique'      => ':attribute은(는) 이미 사용 중입니다.',
    'uploaded'    => ':attribute을(를) 업로드하지 못했습니다.',
    'url'         => ':attribute 형식은 올바르지 않습니다.',
    'uuid'        => ':attribute은(는) 유효한UUID여야합니다.',

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
        "status" => "Статус",
        "name_uz" => "이름 uz",
        "name_ar" => "이름 العربية",
        "name_ko" => "이름 아랍어",
        "name_en" => "이름 en",
        "name_ru" => "이름 ru",
        "slug_uz" => "Url 에서 보기 uz",
        "slug_ar" => "Url 에서 보기 العربية",
        "slug_ko" => "Url 에서 보기 아랍어",
        "slug_en" => "Url 에서 보기 en",
        "slug_ru" => "Url 에서 보기 ru",
        "breadcrumb_bg_image" => "이미지 카테고리",
        "c_order" => "순서",
        'title_uz' => '헤더 uz',
        'title_en' => '헤더 en',
        'title_ru' => '헤더 ru',
        'title_ar' => '헤더 العربية',
        'title_ko' => '헤더 아랍어',
        'short_desc_uz' => '간단한 설명 uz',
        'short_desc_en' => '간단한 설명 en',
        'short_desc_ru' => '간단한 설명 ru',
        'short_desc_ar' => '간단한 설명 العربية',
        'short_desc_ko' => '간단한 설명 아랍어',
        'desc_uz' => '설명 uz',
        'desc_en' => '설명 en',
        'desc_ru' => '설명 ru',
        'desc_ar' => '설명 العربية',
        'desc_ko' => '설명 아랍어',
        'image' => '이미지',
        'slug' => 'Url 에서 보기',
        'name' => '이름',
        'opinion' => '우리에 대한 의견',
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
        'message'               => '메시지',
        "new_pwd"               => "새 암호",
        "conf_pwd"              => "비밀번호 확인"
    ],
];
