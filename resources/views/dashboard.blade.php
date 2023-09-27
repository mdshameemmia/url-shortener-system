<x-app-layout>


    <div class="container">
        <div class="col-md-12">

            <form action="{{ route('generate.short-url') }}" method="POST">
                @csrf
                <div class="form-group d-flex justify-content-between col-md-10 my-2">
                    <input type="text" name="original_url" class="form-control col-md-4" placeholder="Input your long url">
                    <button type="submit" class="btn btn-primary col-md-2 btn-sm">Generate Short URL</button>
                </div>
            </form>

            @isset($urls)
                
            
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Ser No</th>
                            <th>Short URL</th>
                            <th>Original URL</th>
                            <th>Total Visit</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($urls as $key => $url)
                        <tr>
                            <td>{{$loop->iteration ??""}}</td>
                            <td><a href="{{url('redirect',$url->short_url)}}" target="_blank">{{url('/')}}/{{$url->short_url ?? ''}}</a></td>
                            <td>{{$url->original_url ?? ''}}</td>
                            <td>{{$url->total_visit ?? ''}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Record Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                @endisset 

        </div>
    </div>
</x-app-layout>
