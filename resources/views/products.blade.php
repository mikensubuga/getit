@foreach($computers as $computer)
        
             
                 <h3>
                    {{$computer->name}}
                 </h3>
             
             <h5>
                 Body 
             </h5>
             <p> {{$computer->body}}</p>
             <h5>
                Type
            </h5>
            {{-- <p> {{$computer->type->name}}</p> --}}
            <p> c: {{$computer->type['name']}}</p>


             <a>
                <img src="{{asset("storage/$computer->image")}}"/>
            </a>
            <br>
    
    
     @endforeach