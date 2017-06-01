
<section id="SearchInside">
    <div id="ShowSearch"><i class="fa fa-search"></i>&nbsp;&nbsp;&nbsp;Search</div>
    <div class="Row">
        {{Form::model(session('filter'),array('route' => array('public.search'),'method' => 'GET' ,'class' => 'SliderHomeSearchForm'))}}
        <div class="SliderHomeSearchBox">
            <div class="HomeStyledSelect Location">
            {{ Form::select('type', $type,null,['class' => 'form-control', 'placeholder'=> 'Odaberi vrstu']) }}
            </div>
        </div>
        <div class="SliderHomeSearchBox">
            <div class="HomeStyledSelect Persons">
               {{ Form::select('region', $region, null,['class' => 'form-control', 'placeholder'=> 'Odaberi županiju']) }}
            </div>
        </div>
        <div class="SliderHomeSearchBox">
            <button class="SendInside">Pretraži</button>
        </div>
        {{Form::close()}}
    </div>
</section>