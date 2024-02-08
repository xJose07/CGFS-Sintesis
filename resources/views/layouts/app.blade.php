<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home')}}" role="button">{{ __('Inicio') }}</a></li> 
                
                            <a id="reservartaula" class="nav-link" href="{{ route('reserva') }}" role="button">
                                {{_('Reserva mesa') }}        
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a id="hola" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{_('Cartas') }}        
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="hola">
                                        <a class="dropdown-item" href="{{ route('menu') }}">{{ __('Menu del dia') }}</a>
                                        <a class="dropdown-item" href="{{ route('carta') }}">{{ __('Carta') }}</a>
                                        <a class="dropdown-item" href="{{ route('carta_vi') }}">{{ __('Carta de vino') }}</a>
                            </div> 
                        </li>
                    </ul>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact-form')}}" role="button">{{ __('Contáctanos') }}</a></li>
                        </li>
                        @if(Auth::user()->image)
                                    <img src="{{ route('avatar', ['filename'=>Auth::user()->image])}}" class="avatar" height="30px" width="35px" style="border-radius: 50%;">
                                @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                                
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('edit') }}">
                                        {{ __('Editar Perfil') }}
                                    </a>

                                   @if(Auth::user()->role == 'admin')
                                        <a class="dropdown-item" href="{{ route('edit-role') }}">
                                            <img class='barnavadmin'> {{ __('Modificar roles') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('edit-reserva') }}">
                                            <img class='barnavadmin'> {{ __('Eliminar/Ver Reservas') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('imgnova') }}">
                                            <img class='barnavadmin'> {{ __('Crear evento') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('veureevents') }}">
                                            <img class='barnavadmin'> {{ __('Eliminar evento') }}
                                        </a>
                                    @endif

                                    @if(Auth::user()->role == 'chef')
                                        <a class="dropdown-item" href="{{ route('plat') }}">
                                            <img class='barnavchef'> {{ __('Crear plato') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('vi') }}">
                                            <img class='barnavchef'> {{ __('Añadir vino') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('dia') }}">
                                            <img class='barnavchef'> {{ __('Crear menu del dia') }}
                                        </a>
                                    @endif 
                                    <a class="dropdown-item" href="{{ route('verreserva') }}">
                                        {{ __('Ver mis reservas activas') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('deleteusersegur') }}" style="color: red">
                                        {{ __('ELIMINAR CUENTA') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <br><br><br><br><br><br>
    <div class="main"></div>
<div class="footer">
  <div class="bubbles">
    <div class="bubble" style="--size:5.4402393231881465rem; --distance:9.465510787976172rem; --position:86.99571404592592%; --time:2.189231414271654s; --delay:-3.5525870403313395s;"></div>
    <div class="bubble" style="--size:5.595178709515244rem; --distance:8.159547169884302rem; --position:23.926856564137616%; --time:3.4255298367487983s; --delay:-2.3389634771975754s;"></div>
    <div class="bubble" style="--size:2.8932960708582565rem; --distance:8.077914518685274rem; --position:98.12984269202218%; --time:2.9475829728915515s; --delay:-2.5538258102424667s;"></div>
    <div class="bubble" style="--size:2.6262288535770155rem; --distance:9.770139991758242rem; --position:2.9372569667515824%; --time:3.668381503538759s; --delay:-3.0369413525887223s;"></div>
    <div class="bubble" style="--size:3.014274153611451rem; --distance:8.363667642854757rem; --position:100.25024237591246%; --time:2.88097645665262s; --delay:-2.5867323420668806s;"></div>
    <div class="bubble" style="--size:2.490767547289466rem; --distance:8.66535901819316rem; --position:82.31127911676649%; --time:3.989578395201375s; --delay:-2.160389931055014s;"></div>
    <div class="bubble" style="--size:3.908313065858729rem; --distance:7.083494745090561rem; --position:87.92428724125071%; --time:3.056119704836463s; --delay:-2.4115654041614323s;"></div>
    <div class="bubble" style="--size:5.728462869532267rem; --distance:6.31354370364337rem; --position:47.14660008523361%; --time:2.6208691915470066s; --delay:-3.8061077157537095s;"></div>
    <div class="bubble" style="--size:4.417627429444609rem; --distance:6.865402361306216rem; --position:54.250168272356646%; --time:3.5112329721110775s; --delay:-2.656298664011117s;"></div>
    <div class="bubble" style="--size:4.438082712646362rem; --distance:7.374316513514634rem; --position:2.091074503948236%; --time:3.2911126336238246s; --delay:-3.382884983677921s;"></div>
    <div class="bubble" style="--size:5.842235508654312rem; --distance:8.042048823710502rem; --position:90.74518356800483%; --time:3.1838430873315997s; --delay:-3.3600222834430653s;"></div>
    <div class="bubble" style="--size:5.322637999860358rem; --distance:6.504993608008641rem; --position:92.53928354718431%; --time:2.3593960476867473s; --delay:-3.3450890492352903s;"></div>
    <div class="bubble" style="--size:5.104290613028865rem; --distance:8.810427593717932rem; --position:36.66818848345631%; --time:2.9435860327218s; --delay:-3.3397819281226204s;"></div>
    <div class="bubble" style="--size:5.33071233064839rem; --distance:7.185795884024347rem; --position:84.15484966099105%; --time:3.137387295302355s; --delay:-3.159739921434412s;"></div>
    <div class="bubble" style="--size:3.4666449282827854rem; --distance:7.619952525964911rem; --position:53.01837818741849%; --time:3.3396456947774134s; --delay:-2.617354962489617s;"></div>
    <div class="bubble" style="--size:3.7712505257270355rem; --distance:7.472549141206119rem; --position:77.60831269660665%; --time:2.1256657973104756s; --delay:-2.945720353485338s;"></div>
    <div class="bubble" style="--size:2.0780565401535114rem; --distance:6.566831755841001rem; --position:91.90373337660226%; --time:3.304786297262995s; --delay:-2.90669708189947s;"></div>
    <div class="bubble" style="--size:5.86161572516191rem; --distance:6.198387413461677rem; --position:71.63662096378704%; --time:2.699929214547596s; --delay:-3.897623800821074s;"></div>
    <div class="bubble" style="--size:2.2645219482922423rem; --distance:7.894248774650505rem; --position:45.07619292938698%; --time:3.9503393062243806s; --delay:-2.8598153322268547s;"></div>
    <div class="bubble" style="--size:5.530462008621016rem; --distance:9.215241078722055rem; --position:74.24416229061474%; --time:2.2493847406052154s; --delay:-3.2592284741471103s;"></div>
    <div class="bubble" style="--size:4.517748415289295rem; --distance:9.768268557555643rem; --position:87.01016040394705%; --time:2.843581509721357s; --delay:-2.798057999451385s;"></div>
    <div class="bubble" style="--size:3.6680643094964314rem; --distance:7.7879679175768475rem; --position:33.22620602262054%; --time:2.8723385978399514s; --delay:-2.3115575469554073s;"></div>
    <div class="bubble" style="--size:2.8121154228011402rem; --distance:7.771275232110955rem; --position:52.95112185783088%; --time:2.200087053812744s; --delay:-3.8449150206439677s;"></div>
    <div class="bubble" style="--size:3.9620735797268702rem; --distance:7.0897349492501744rem; --position:88.04062563629672%; --time:3.808335895002929s; --delay:-3.339094777209764s;"></div>
    <div class="bubble" style="--size:5.821891174717238rem; --distance:7.662874063357253rem; --position:95.34732918234772%; --time:2.8873252742560602s; --delay:-2.1100541558582773s;"></div>
    <div class="bubble" style="--size:2.2139513235652517rem; --distance:6.331498188085908rem; --position:3.5753267907967174%; --time:2.733520115848448s; --delay:-2.918849762099907s;"></div>
    <div class="bubble" style="--size:5.41034982024658rem; --distance:6.36026273819997rem; --position:63.90934191561897%; --time:3.664311500586662s; --delay:-3.3593186965767243s;"></div>
    <div class="bubble" style="--size:5.229702812192053rem; --distance:7.331406217946299rem; --position:68.01261325693457%; --time:3.7493141025467485s; --delay:-2.62382798814979s;"></div>
    <div class="bubble" style="--size:3.9806189219390227rem; --distance:6.811242109052308rem; --position:82.99567411074554%; --time:2.3783669018282754s; --delay:-2.887331140402322s;"></div>
    <div class="bubble" style="--size:4.606158687159668rem; --distance:9.480079669320482rem; --position:53.7927703137423%; --time:3.4220354263066373s; --delay:-3.9227635346320957s;"></div>
    <div class="bubble" style="--size:3.479938087396998rem; --distance:6.57916572267308rem; --position:-0.6782044365693434%; --time:2.5486880327977506s; --delay:-3.58994973424318s;"></div>
    <div class="bubble" style="--size:2.7557796200773703rem; --distance:7.319354861377939rem; --position:8.588978420657224%; --time:3.198450046324835s; --delay:-2.017865304427532s;"></div>
    <div class="bubble" style="--size:4.169862780610035rem; --distance:9.049454353257937rem; --position:93.42527560315506%; --time:2.715923187813844s; --delay:-3.885911777417085s;"></div>
    <div class="bubble" style="--size:4.493574718597282rem; --distance:9.519680767679821rem; --position:30.872601225284853%; --time:3.819991196314461s; --delay:-3.917856766803418s;"></div>
    <div class="bubble" style="--size:4.769485318495684rem; --distance:7.91327249666414rem; --position:82.64581207094541%; --time:3.4335744445770686s; --delay:-3.7653283154975177s;"></div>
    <div class="bubble" style="--size:4.293992885111656rem; --distance:7.812254430473416rem; --position:67.43678232301428%; --time:3.400788642590127s; --delay:-2.409563347424663s;"></div>
    <div class="bubble" style="--size:3.7673201378938463rem; --distance:8.452775883584383rem; --position:96.18963633120583%; --time:3.395559971356246s; --delay:-3.084249693055808s;"></div>
    <div class="bubble" style="--size:4.370386501994472rem; --distance:7.9139378705356895rem; --position:67.2575926810122%; --time:2.0924577354525336s; --delay:-3.632549393031981s;"></div>
    <div class="bubble" style="--size:2.2146510307101535rem; --distance:7.433796179542949rem; --position:48.99428592184281%; --time:3.0589944439951067s; --delay:-2.7800501827046427s;"></div>
    <div class="bubble" style="--size:3.533579123117911rem; --distance:9.164551637066474rem; --position:7.24914520070422%; --time:3.9612300815067503s; --delay:-3.865499981913684s;"></div>
    <div class="bubble" style="--size:5.366803531946887rem; --distance:7.730661555093031rem; --position:0.18808460900512358%; --time:2.2700911166747084s; --delay:-3.551181294073607s;"></div>
    <div class="bubble" style="--size:4.31714555681667rem; --distance:7.998626316259565rem; --position:59.27243402283088%; --time:3.678616580210413s; --delay:-3.8971173033211874s;"></div>
    <div class="bubble" style="--size:5.614429360914318rem; --distance:7.613159870208476rem; --position:70.03992558891096%; --time:2.868131077396826s; --delay:-2.333818416138115s;"></div>
    <div class="bubble" style="--size:3.5023837788269256rem; --distance:8.814977643467136rem; --position:40.292990372697915%; --time:2.5620004187217806s; --delay:-3.9505028344468753s;"></div>
    <div class="bubble" style="--size:3.6523560723716786rem; --distance:6.792076891019275rem; --position:72.36863767023348%; --time:3.094275246078808s; --delay:-3.999673552733674s;"></div>
    <div class="bubble" style="--size:4.501026071524789rem; --distance:9.205211912802861rem; --position:98.96772949238763%; --time:3.7962240811851014s; --delay:-2.2436754807584784s;"></div>
    <div class="bubble" style="--size:5.155675983380566rem; --distance:9.71207057559972rem; --position:92.65930599782175%; --time:2.6863921518034615s; --delay:-2.210391445501276s;"></div>
    <div class="bubble" style="--size:2.013780262003192rem; --distance:9.646439051841785rem; --position:33.125779159304095%; --time:2.3965595990004456s; --delay:-3.865337495442963s;"></div>
    <div class="bubble" style="--size:5.218129191465211rem; --distance:7.303441256962753rem; --position:19.054994915438826%; --time:2.6072183038685015s; --delay:-3.515295680349869s;"></div>
    <div class="bubble" style="--size:3.389855304261931rem; --distance:6.218321600920756rem; --position:89.72013700890852%; --time:2.2261929041559556s; --delay:-3.922804335812844s;"></div>
    <div class="bubble" style="--size:2.5868398025217694rem; --distance:8.575360520294637rem; --position:7.06603379042917%; --time:2.254601620430897s; --delay:-2.503096935248617s;"></div>
    <div class="bubble" style="--size:2.327913500478055rem; --distance:6.240051440464211rem; --position:59.15365712783954%; --time:2.7091221221066206s; --delay:-2.6583091279391122s;"></div>
    <div class="bubble" style="--size:5.130094898548248rem; --distance:7.2396272779898005rem; --position:40.061587460567985%; --time:2.5462904892778138s; --delay:-3.080295480282286s;"></div>
    <div class="bubble" style="--size:3.8544338811528585rem; --distance:6.617445877610006rem; --position:67.14378071432525%; --time:3.9668995101340654s; --delay:-2.796351486614544s;"></div>
    <div class="bubble" style="--size:3.206970131164444rem; --distance:7.704996715871662rem; --position:24.303858637875134%; --time:3.90692206958942s; --delay:-3.3210067983678955s;"></div>
    <div class="bubble" style="--size:4.0622476916411925rem; --distance:7.384512637675079rem; --position:75.26267432777121%; --time:3.9160912251785907s; --delay:-2.872631818271448s;"></div>
    <div class="bubble" style="--size:5.609677549368994rem; --distance:9.445170083632446rem; --position:52.69998089010904%; --time:3.6046239354811824s; --delay:-2.3602694023343704s;"></div>
    <div class="bubble" style="--size:2.6084288461793745rem; --distance:9.3161792099814rem; --position:66.32551997507517%; --time:3.8047701332278754s; --delay:-2.798531804971113s;"></div>
    <div class="bubble" style="--size:2.273031980366021rem; --distance:9.466749985819252rem; --position:93.25419631097168%; --time:3.5078225065568125s; --delay:-2.132628490521386s;"></div>
    <div class="bubble" style="--size:2.3905891348161656rem; --distance:6.9372874274418335rem; --position:71.63172035765987%; --time:2.3532175166663327s; --delay:-2.1663829183006094s;"></div>
    <div class="bubble" style="--size:2.618907987883129rem; --distance:6.363944600532648rem; --position:76.90337790735377%; --time:2.394812490206144s; --delay:-3.423930699320953s;"></div>
    <div class="bubble" style="--size:5.665348258562341rem; --distance:9.41053034097615rem; --position:11.108168282344614%; --time:3.0209664083874412s; --delay:-3.1513126385892667s;"></div>
    <div class="bubble" style="--size:2.054906402617644rem; --distance:6.303904301827149rem; --position:29.309820042869788%; --time:3.698342879853223s; --delay:-2.2124358423176833s;"></div>
    <div class="bubble" style="--size:2.6120190126340868rem; --distance:9.063751682747103rem; --position:54.0562696074869%; --time:2.735753077348499s; --delay:-3.932029277149369s;"></div>
    <div class="bubble" style="--size:2.567893291311462rem; --distance:6.798824727618725rem; --position:41.29400893470708%; --time:3.832457946784502s; --delay:-3.1035053842322373s;"></div>
    <div class="bubble" style="--size:5.411117907596348rem; --distance:9.781238866151899rem; --position:68.80633535331732%; --time:3.1778633119528887s; --delay:-2.4007594718578975s;"></div>
    <div class="bubble" style="--size:4.78665737773478rem; --distance:7.266683012287876rem; --position:41.063679294928384%; --time:3.929954243045616s; --delay:-3.582439503364924s;"></div>
    <div class="bubble" style="--size:2.640302698124171rem; --distance:8.029868311473974rem; --position:52.19756113664495%; --time:2.1922076013228344s; --delay:-2.4120184567084086s;"></div>
    <div class="bubble" style="--size:5.049635378719604rem; --distance:9.744421050337202rem; --position:74.79761053616642%; --time:2.741986521433065s; --delay:-2.0333804814477117s;"></div>
    <div class="bubble" style="--size:3.0125647083720173rem; --distance:7.871175384683049rem; --position:16.70799164527816%; --time:3.795206696308405s; --delay:-2.802060531357479s;"></div>
    <div class="bubble" style="--size:4.156437891331154rem; --distance:9.505107426966081rem; --position:12.993062618961314%; --time:3.951760337103937s; --delay:-2.1986622301667933s;"></div>
    <div class="bubble" style="--size:5.387697324964047rem; --distance:9.366884273990852rem; --position:55.25166708675115%; --time:2.7100658431902027s; --delay:-2.046886638605938s;"></div>
    <div class="bubble" style="--size:3.131876030148077rem; --distance:9.255746659231864rem; --position:51.63244151848154%; --time:2.83322697245496s; --delay:-3.873564011167174s;"></div>
    <div class="bubble" style="--size:2.079358816872001rem; --distance:9.81493955643442rem; --position:30.338120468062563%; --time:2.828085616132085s; --delay:-2.2592258704142845s;"></div>
    <div class="bubble" style="--size:4.4482649944302rem; --distance:9.578075098583206rem; --position:29.772851164325004%; --time:3.6811247796191s; --delay:-2.8075105851706113s;"></div>
    <div class="bubble" style="--size:4.200175875306267rem; --distance:8.25651716436268rem; --position:26.6847457327611%; --time:2.296909725568838s; --delay:-2.117983431228628s;"></div>
    <div class="bubble" style="--size:4.883452686607544rem; --distance:9.308826633408067rem; --position:34.113314241995525%; --time:2.2291785679451257s; --delay:-3.2855837073752188s;"></div>
    <div class="bubble" style="--size:5.284948549986352rem; --distance:8.498857932863178rem; --position:85.97454763256894%; --time:2.276109798818711s; --delay:-3.8670060914777995s;"></div>
    <div class="bubble" style="--size:2.0581749939945997rem; --distance:7.583738580525337rem; --position:24.10014463096077%; --time:3.803795516492666s; --delay:-3.039177924714879s;"></div>
    <div class="bubble" style="--size:4.252621151127128rem; --distance:6.036067052568774rem; --position:18.42702518066535%; --time:2.6164878552172293s; --delay:-3.474388067453959s;"></div>
    <div class="bubble" style="--size:4.117716055083195rem; --distance:9.623680526117237rem; --position:49.710807013876995%; --time:3.278502519345717s; --delay:-2.5706776585351063s;"></div>
    <div class="bubble" style="--size:5.039746836099206rem; --distance:7.957785112411255rem; --position:73.01383905622866%; --time:3.186816542564387s; --delay:-2.9089578001223098s;"></div>
    <div class="bubble" style="--size:3.4621518815598806rem; --distance:7.712234624414454rem; --position:87.16179120951249%; --time:3.1148911019465246s; --delay:-3.991332685732241s;"></div>
    <div class="bubble" style="--size:3.095121961563545rem; --distance:6.839124942677765rem; --position:47.736653555718355%; --time:3.8201164379353236s; --delay:-3.873055098120243s;"></div>
    <div class="bubble" style="--size:4.231310624542829rem; --distance:6.375053154401988rem; --position:28.172140661230934%; --time:3.271982662277823s; --delay:-3.473088818999985s;"></div>
    <div class="bubble" style="--size:3.309007789188195rem; --distance:9.762238084339108rem; --position:35.64054596079498%; --time:3.164443548129562s; --delay:-3.219920240104852s;"></div>
    <div class="bubble" style="--size:5.73139043132851rem; --distance:8.894122503350154rem; --position:93.60568484319259%; --time:2.5806422439069188s; --delay:-3.9837511356558424s;"></div>
    <div class="bubble" style="--size:5.994505062905374rem; --distance:7.880664575981252rem; --position:41.560077816228855%; --time:2.8133300506609054s; --delay:-3.612990090823139s;"></div>
    <div class="bubble" style="--size:3.039196917664629rem; --distance:7.694604091361696rem; --position:5.249419208269977%; --time:2.0069197372524377s; --delay:-3.857356543205305s;"></div>
    <div class="bubble" style="--size:5.857148221727346rem; --distance:6.09865623193174rem; --position:20.449173155411437%; --time:3.5526909789360968s; --delay:-2.913690218203662s;"></div>
    <div class="bubble" style="--size:5.5523697456156205rem; --distance:6.869633018981889rem; --position:93.26884397669171%; --time:3.6623964382592162s; --delay:-3.5998272865421312s;"></div>
    <div class="bubble" style="--size:2.462528239152328rem; --distance:6.576065520778533rem; --position:33.29985039488767%; --time:3.746179970443201s; --delay:-2.4060909052860144s;"></div>
    <div class="bubble" style="--size:2.540010360942105rem; --distance:9.567569712455498rem; --position:66.50164146003608%; --time:2.9187896770259902s; --delay:-2.871338304561223s;"></div>
    <div class="bubble" style="--size:4.661692947700583rem; --distance:8.484586408028758rem; --position:56.32409223916992%; --time:3.3221725751947457s; --delay:-3.935075715401244s;"></div>
    <div class="bubble" style="--size:2.5685450936387424rem; --distance:6.090610902985563rem; --position:17.80174957691414%; --time:3.4611240735768396s; --delay:-3.126163272363927s;"></div>
    <div class="bubble" style="--size:2.3550649836648994rem; --distance:9.659911834902283rem; --position:86.5974888695355%; --time:2.9616637863226134s; --delay:-2.2107550397104303s;"></div>
    <div class="bubble" style="--size:2.015872659001383rem; --distance:8.231881419496048rem; --position:68.61139246094214%; --time:2.818887782596719s; --delay:-3.680962343382406s;"></div>
    <div class="bubble" style="--size:2.7857511298604543rem; --distance:8.619265203844435rem; --position:46.553017752051424%; --time:2.4554838930105323s; --delay:-2.275161130875149s;"></div>
    <div class="bubble" style="--size:3.433174734557702rem; --distance:6.493733121258366rem; --position:17.825095493761005%; --time:3.155933791255422s; --delay:-3.201546250986023s;"></div>
    <div class="bubble" style="--size:5.0637187029503155rem; --distance:8.664156897678106rem; --position:81.5736212907329%; --time:3.157696239490697s; --delay:-3.8663717989728252s;"></div>
    <div class="bubble" style="--size:5.7006891184868485rem; --distance:9.08710946083286rem; --position:101.16464919344386%; --time:3.030104563904987s; --delay:-3.577880797206573s;"></div>
    <div class="bubble" style="--size:5.555036607913206rem; --distance:9.465653810155775rem; --position:27.103227409213773%; --time:3.1146099807811085s; --delay:-3.1448524804724562s;"></div>
    <div class="bubble" style="--size:2.752934061114983rem; --distance:8.204945653029938rem; --position:47.258326353949045%; --time:3.1504388821875473s; --delay:-2.3636624257308583s;"></div>
    <div class="bubble" style="--size:4.416440083494418rem; --distance:8.20047770625716rem; --position:4.2621078148784175%; --time:2.5349409255511457s; --delay:-2.4382670912301805s;"></div>
    <div class="bubble" style="--size:3.620024256055995rem; --distance:9.495036840626884rem; --position:41.02914341897111%; --time:2.4982289182528623s; --delay:-3.334070203914069s;"></div>
    <div class="bubble" style="--size:3.4889019919599438rem; --distance:6.1745257352300555rem; --position:61.51468620378205%; --time:3.926881886331223s; --delay:-2.7192562077854805s;"></div>
    <div class="bubble" style="--size:5.984130062739021rem; --distance:9.37971662478587rem; --position:90.08073785992751%; --time:3.7838620854292406s; --delay:-3.947753608565691s;"></div>
    <div class="bubble" style="--size:2.6689916696243072rem; --distance:7.6844051933302735rem; --position:72.1059971061064%; --time:2.600338120394096s; --delay:-2.006365775557483s;"></div>
    <div class="bubble" style="--size:3.8084546322563897rem; --distance:8.796299818172134rem; --position:40.33691793989358%; --time:2.8193952325596863s; --delay:-3.7545783239952093s;"></div>
    <div class="bubble" style="--size:5.090981151247042rem; --distance:6.651679063111539rem; --position:92.71696763863196%; --time:2.1639313382591596s; --delay:-2.1375915762571314s;"></div>
    <div class="bubble" style="--size:4.653904282944313rem; --distance:7.169408773208587rem; --position:22.617002745416418%; --time:2.9872187271795534s; --delay:-3.338150640309345s;"></div>
    <div class="bubble" style="--size:2.3281558753606326rem; --distance:8.593317083437448rem; --position:12.585553568350957%; --time:2.969418750145911s; --delay:-3.766304424900793s;"></div>
    <div class="bubble" style="--size:3.910737939720163rem; --distance:9.944479175245316rem; --position:26.450570698073285%; --time:3.6632464841492993s; --delay:-2.9664752244783057s;"></div>
    <div class="bubble" style="--size:2.7723754015676576rem; --distance:9.31766205757852rem; --position:22.31350469091311%; --time:2.124222014224936s; --delay:-3.666876041372186s;"></div>
    <div class="bubble" style="--size:2.472873933704893rem; --distance:6.228107820312878rem; --position:82.0605759373226%; --time:2.866983334524425s; --delay:-2.3563586566349364s;"></div>
    <div class="bubble" style="--size:4.0703939346499975rem; --distance:7.441311816003572rem; --position:50.39826011064253%; --time:3.896747632053963s; --delay:-2.2980209179234437s;"></div>
    <div class="bubble" style="--size:2.664718148123809rem; --distance:7.622652730837156rem; --position:16.89266858570584%; --time:2.6545267169618785s; --delay:-3.384916261246301s;"></div>
    <div class="bubble" style="--size:5.3173686094583745rem; --distance:8.394423477738272rem; --position:-1.037687141651098%; --time:2.6905366856567365s; --delay:-2.629477264162057s;"></div>
    <div class="bubble" style="--size:5.172498591207968rem; --distance:7.665856333490853rem; --position:70.08315760089013%; --time:3.2803267014735558s; --delay:-3.936662669032012s;"></div>
    <div class="bubble" style="--size:5.1933296180402575rem; --distance:6.964899552025461rem; --position:71.0589918809376%; --time:3.7170682764075367s; --delay:-3.0649676049164714s;"></div>
    <div class="bubble" style="--size:3.5164752948765248rem; --distance:7.862875756604642rem; --position:9.405234328870339%; --time:3.683352591262647s; --delay:-2.3136405636155017s;"></div>
    <div class="bubble" style="--size:4.286773884725157rem; --distance:6.905435807167449rem; --position:56.51367255269215%; --time:3.1747801606742634s; --delay:-3.4551767438706493s;"></div>
    <div class="bubble" style="--size:2.9527864770965095rem; --distance:6.844565243841069rem; --position:32.9684967425854%; --time:3.3043424567628876s; --delay:-2.068216076191499s;"></div>
    <div class="bubble" style="--size:4.642870439997788rem; --distance:6.271811814938996rem; --position:8.761494807218579%; --time:3.6129195681704838s; --delay:-2.831003789021889s;"></div>
    <div class="bubble" style="--size:3.4227719290980474rem; --distance:9.914807699364527rem; --position:5.549461784243919%; --time:3.4929891499748087s; --delay:-2.334729803083394s;"></div>
    <div class="bubble" style="--size:4.81059415291125rem; --distance:9.438672194576252rem; --position:53.4619938949355%; --time:2.7856903528301165s; --delay:-3.9984955967587132s;"></div>
    <div class="bubble" style="--size:4.60955964841195rem; --distance:6.7121012012835015rem; --position:98.10646338073965%; --time:2.68046449508299s; --delay:-3.197172811569426s;"></div>
    <div class="bubble" style="--size:4.059859420997644rem; --distance:8.94275457923015rem; --position:15.452433457515799%; --time:2.0709456455508883s; --delay:-2.0782254157196296s;"></div>
  </div>
  <div class="content">
    <div>
      <p>&copy; 2022, Restaurantes Bola</p>
    </div>
    <div><a class="image" target="_blank" style="background-image: url(&quot;https://s3-us-west-2.amazonaws.com/s.cdpn.io/199011/happy.svg&quot;)"></a>
    </div>
  </div>
</div>
<svg style="position: fixed; top: 100vh">
  <defs>
    <filter id="blob">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="blob"></feColorMatrix>
      <feComposite in="SourceGraphic" in2="blob" operator="atop"></feComposite>
    </filter>
  </defs>
</svg>
</body>
</html>
