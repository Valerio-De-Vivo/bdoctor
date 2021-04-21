<section class="sidebar-dash">

    <ul>
        <li>
            
            <a class=" {{ (Request::route()->getName() == 'dashboard-dottore') ? 'active-dash' : '' }} " href="{{ route('dashboard-dottore')}} "> <i class="fas fa-user"></i> Il tuo profilo</a>
        </li>
        <li>
            <a class=" {{ (Request::route()->getName() == 'message.index') ? 'active-dash' : '' }} " href="{{ route('message.index')}}"><i class="fas fa-envelope"></i> Messaggi</a>
        </li>
        <li>
            <a class=" {{ (Request::route()->getName() == 'review.index') ? 'active-dash' : '' }} " href="{{ route('review.index')}}"><i class="fas fa-star"></i> Recensioni</a>
        </li>
        <li>
            <a class=" {{ (Request::route()->getName() == 'statistics.index') ? 'active-dash' : '' }} " href="{{ route('statistics.index')}}"><i class="fas fa-chart-pie"></i> Statistiche</a>
        </li>
    </ul>


</section>