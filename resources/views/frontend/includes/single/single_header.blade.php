<?php
use Illuminate\Support\Facades\Route;
use Harimayco\Menu\Facades\Menu;

$currentPath= Route::getFacadeRoot()->current()->uri();
$menuList = Menu::getByName('admin');

?>

<nav class="navbar navbar-default navbar-main navbar-fixed-top   lightHeader " role="navigation">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">


                @foreach($menuList as $key=>$menu)
                        @if($menu['is_mega'] == 1)


                    <li class="dropdown megaDropMenu <?php echo (\App\Helpers\SystemHelper::isActiveMenu($currentPath, $menuList[$key]))?'active':''?>">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true" aria-expanded="false">{{$menu['label']}}</a>
                        <ul class="row dropdown-menu">
                            @foreach($menu['child'] as $layerOne)
                            <li class="col-sm-4 col-xs-12">
                                <ul class="list-unstyled">

                                    <li>{{$layerOne['label']}}</li>
                                    @if(is_array($layerOne['child']) && sizeof($layerOne['child'])>0)
                                        @foreach($layerOne['child'] as $layerTwo)
                                    <li class=""><a href="{!! $layerTwo['link'] !!}}">{{$layerTwo['label']}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                            @else
                        <li class="dropdown singleDrop <?php echo (\App\Helpers\SystemHelper::isActiveMenu($currentPath, $menuList[$key]))?'active':''?>">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">{{$menu['label']}}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                @foreach($menu['child'] as $layerOne)
                                    <li class="dropdown dropdown-submenu">
                                        @if(is_array($layerOne['child']) && sizeof($layerOne['child'])>0)
                                            <a href="javascript:void(0)" class="dropdown-toggle"
                                               data-toggle="dropdown">{{$layerOne['label']}}<i class="fa fa-chevron-right"
                                                                                               aria-hidden="true"></i></a>
                                            <ul class="dropdown-menu">
                                                @foreach($layerOne['child'] as $layerTwo)
                                                    <li class=""><a
                                                                href="blog-grid-three-col.html">{{$layerTwo['label']}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                    @else
                                        <li class="dropdown singleDrop"><a
                                                    href="{{$layerOne['link']}}">{{$layerOne['label']}}</a></li>
                                        @endif
                                        </li>
                                        @endforeach

                            </ul>
                        </li>

                    @endif

                @endforeach

            </ul>
        </div>

    </div>
</nav>
</header>