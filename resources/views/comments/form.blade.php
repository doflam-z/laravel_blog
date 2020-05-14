<form id="reply{{$parentId}}" method="POST" action="{{url('post/'.$post->id.'/comments')}}" accept-charset="UTF-8" style="display: none">
    {{csrf_field()}}

    @if(isset($parentId))
        <input type="hidden" name="parent_id" value="{{$parentId}}">
    @endif

    <div class="form-group">
        <label for="body" class="control-label">Info:</label>
        <textarea id="body" name="body"  class="form-control" required="required"></textarea>
    </div>
    <button type="submit" class="btn btn-success">回复</button>
</form>
