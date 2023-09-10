<!-- Modal -->
<div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Doctor')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('classroom.destroy', $classroom->id) }}" method="post">
                @method('delete')
                @csrf
                @if($classroom->image)
                <input type="hidden" name="filename" value="{{$classroom->image->filename}}">
            @endif
            <input type="hidden" name="id" value="{{ $classroom->id }}">
                <h5>هل انت متاكد من عملية الحذف</h5>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
