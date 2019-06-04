<div class="">
    <h4 class="h4-responsive">Search Services</h4>
 <!-- Search form -->
    <form class="form-inline md-form form-sm mt-0" action="{{ route('search') }}" method="GET">
            <i class="fas fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-sm ml-3 w-75" value="{{request()->input('query')}}" name="query" id="query" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-success btn-rounded btn-sm my-0" type="submit">Search</button>

        </form>
    <!-- /.input-group -->
   

</div>