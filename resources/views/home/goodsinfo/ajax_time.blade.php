
@foreach($begin_time as $k=>$v)
    @if($k==0)
        <?php $arr = $v; ?>
    @endif
@endforeach
    <?php 
        $k = 0;
        $a = explode('/',$arr->begin_time);
        $year = $a[0];
        $mouth = $a[1];
        foreach($begin_time as $v){
            $a1 = explode('/',$v->begin_time);
            $year1 = $a1[0];
            $mouth1 = $a1[1];
            if($year1 == $year && $mouth1 == $mouth){
                $days[] = $a1[2];
                $arr_day[] = $v;
            }
        }
    ?>
    <?php 
        
        //获取当月的天数
        $day = date("t", mktime(0,0,0,$mouth,1,$year));
        //获取当月一号星期几
        $firstweek = date("w",mktime(0,0,0,$mouth,1,$year));
       $i = 1;

     ?>
     

        @for($a=$day-$firstweek;$a<=$day;$a++)
            <?php $i++; ?>
            <li  class="calendar-date calendar-date-sun calendar-date-other" yan="0">
                <span class="calendar-date-number">{{$a}}</span>
            </li>
        @endfor
        @for($j=1;$j<=$day;$j++)

            <?php $i ++; ?>
            
        
            @if(in_array($j,$days))

                
               <li data-date="2019-01-11" class="calendar-date calendar-date-fri calendar-date-enabled " yan="{{$v->goods_id}}{{$j}}" id="content" begintime="{{$v->begin_time}}" endtime="{{$v->end_time}}" onclick="status(this,{{$v->goods_id}}{{$j}})">
                <span class="calendar-date-number">{{$j}}</span>
                <div class="calendar-date-tag">
                    <span class="calendar-date-tag-item calendar-date-tag-promotion"></span>
                </div>
                <div class="calendar-date-group"></div>
                <div class="calendar-date-content">
                    <div class="calendar-date-rest" style="width:100%;height: 25px;">已成团 余{{$arr_day[$k]->num}}</div>
                    <div class="calendar-date-price">¥{{$goodsinfo->price * ($arr_day[$k]->percent/100)}}起</div></div>
            </li>
            <?php $k++; ?>
            @else
                <li  class="calendar-date
                    calendar-date-tue
                    " yan="0">
                        <span class="calendar-date-number">{{$j}}</span>
                        <div class="calendar-date-tag"></div>
                        <div class="calendar-date-group"></div>
                        <div class="calendar-date-content"></div>
                    </li>
            @endif
             
            
        @endfor
        <?php  $b = 1; ?>
        @while($i % 7 !== 0)
                
                <li  class="calendar-date calendar-date-sun calendar-date-other" yan="0">
                <span class="calendar-date-number">{{$b}}</span>
            </li>
                <?php $i++; ?>
                <?php $b++; ?>
            @endwhile
           <li  class="calendar-date calendar-date-sun calendar-date-other" yan="0">
                <span class="calendar-date-number">{{$b}}</span>
            </li>