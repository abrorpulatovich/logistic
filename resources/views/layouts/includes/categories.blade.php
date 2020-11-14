@php
    use App\Http\Controllers\Controller;
    $settings = Controller::settings();
    $categories = Controller::categories();

    $lang = LaravelLocalization::getCurrentLocale();
    $lang_uc = ucfirst($lang);
@endphp
<ul>
    @foreach($categories as $category)
        @if(!$category->parent()->exists())
            @if($category->child()->exists())
                <li class="has-menu-items"><a href="#">{{ $category->name_by_lang() }}</a>
                    <ul class="sub-menu">
                        @foreach($category->child as $child)
                        <li>
                            <a href="{{ url($child->slug) }}">{{ $child->name_by_lang() }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li><a href="{{ url($category->slug) }}">{{ $category->name_by_lang() }}</a></li>
            @endif
        @endif
    @endforeach
</ul>