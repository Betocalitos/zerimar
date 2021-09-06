<ul>
    <li >
        <a href="{{route('index')}}">INICIO</a>
    </li>
    <li >
        <a href="{{route('about')}}">NOSOTROS</a>
    </li>
    <li class="has-children has-children--multilevel-submenu">
        <a href="javascript:void(0)">EQUIPOS</a>
        <ul class="submenu">
            @foreach ($typesEquipment as $item)
                <li><a href="{{route('equipments.index',[$item->slug])}}">{{$item->name}}</a></li>
            @endforeach
        </ul>
    </li>
    <li >
        <a href="{{route('contact')}}">CONTACTO</a>
    </li>
</ul>
