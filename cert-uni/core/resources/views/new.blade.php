{{--<head>--}}
{{--    <style>--}}
{{--        section{--}}
{{--            background-image: url("../assets/-min.jpg");--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}


{{--<h1><img src="{{ asset('/core/public/post/'. $Image->image) }}" alt="" height="100" width="100" class="center"> {{$ALL->School}}</h1>--}}

{{--<p style="position: center">{{$ALL->Student_name}}<p>--}}
{{--<p>{{$ALL->Program}}</p>--}}
{{--<p>{{$ALL->Class}}</p>--}}
{{--<p>{{$ALL->Year_of_completion}}</p>--}}



    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-text u-text-1" >{{$ALL->School}}</h2>
        <div class="u-list u-repeater u-list-1">
            <div class="u-container-style u-list-item u-repeater-item u-white u-list-item-1">
                <div class="u-container-layout u-similar-container u-container-layout-1">
                    <img src="{{ asset('/core/public/post/'. $Image->image) }}" alt="" height="100" width="100" class="center">
                    <p style="position: center">{{$ALL->Student_name}}<p>
                    <p>{{$ALL->Program}}</p>
                    <p>{{$ALL->Class}}</p>
                    <p>{{$ALL->Year_of_completion}}</p>
                </div>
            </div>
        </div>
    </div>




