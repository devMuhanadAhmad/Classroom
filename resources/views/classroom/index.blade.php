<x-front>
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-flash-message />

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Classroom</h4>
        <!-- Grid Card -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            @foreach ($classrooms as $classroom)
                <div class="col">
                    <div class="card h-100">
                        <a href="{{ route('classroom.show', $classroom->id) }}">
                            <img class="card-img-top" height="200px" src="{{asset('assets/img/'.$classroom->cover_image_path)}}" alt="classroom" />
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><a
                                    href="{{ route('classroom.show', $classroom->id) }}">{{ $classroom->name }}</a></h5>
                            <p class="card-text">
                                {{ $classroom->section }}
                                <br>
                                <br>
                                <div class="row">
                                <div class="col">
                                    <a class="btn btn-primary w-100" href="{{route('classroom.edit',$classroom->id)}}" class="card-link">ُEdit</a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('classroom.destroy',$classroom->id) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger w-100">{{__("Delete")}}
                                        </button>
                                    </form>
                                </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
          <div>
            {{$classrooms->links()}}
          </div>
    </div>



</x-front>
