<x-front>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Classroom/</span> #{{$classroom->id}}</h4>

        <!-- Accordion -->
        <dev class="row">
            <div class="col-md-12"><img class="w-100" height="250px" src="{{asset('assets/img/'.$classroom->cover_image_path)}}"/></div>
        </dev>
        <div class="row">
          <div class="col-md-2 mb-4 mb-md-0">
            <div class="accordion mt-3" id="accordionExample">
              <div class="card accordion-item active">
                <h2 class="accordion-header" id="headingOne">
                  <button
                    type="button"
                    class="accordion-button"
                    data-bs-toggle="collapse"
                    data-bs-target="#accordionOne"
                    aria-expanded="true"
                    aria-controls="accordionOne"
                  >
                  Class code
                  </button>
                </h2>

                <div
                  id="accordionOne"
                  class="accordion-collapse collapse show"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    {{$classroom->code}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-10">
            <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
              <div class="accordion-item card">
                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                  <button
                    type="button"
                    class="accordion-button collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#accordionIcon-1"
                    aria-controls="accordionIcon-1"
                  >
                    Accordion Item 1
                  </button>
                </h2>

                <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                  <div class="accordion-body">
                    Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                    marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                    soufflé. Wafer gummi bears marshmallow pastry pie.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Accordion -->

        <!--/ Advance Styling Options -->
      </div>
</x-front>
