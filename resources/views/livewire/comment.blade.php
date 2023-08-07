

<div class="container">
  <h2>Commenst system<br></h2>
  @error('newComm')
  {{ $message }}

  @enderror

  @if(session()->has('message'))
<p style="color: blue;">{{ session('message') }}</p>
  @endif
    <form  wire:submit.prevent='addComment'>
    <div class="form-group">
      <label for="pwd">Comment<br></label>
      <textarea type="text" class="form-control"  placeholder="Enter text" name="text" wire:model.lazy='newComm'></textarea>
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
</form>
  <br><br>
{{ $newComm }}
  @foreach($comments as $comment)

    {{ $comment->user->name }}
    {{ $comment->created_at->diffForHumans() }}<br>
    {{ $comment->body }}
    <i class="" wire:click='remove({{ $comment->id }})'>X</i>

    
    <hr>

  @endforeach
  {{ $comments->links('pagination-links') }}
</div>


