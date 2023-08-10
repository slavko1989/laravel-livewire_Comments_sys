

<div class="container">
  <h2>Comments system<br></h2>
  @error('newComm')
    {{ $message }}
  @enderror

  @if(session()->has('message'))
        <p style="color: blue;">{{ session('message') }}</p>
  @endif

   @if ($image)
        Photo Preview:
        <img src="{{ $image->temporaryUrl() }}" width="100">
    @endif

    <form  wire:submit.prevent='addComment' enctype="multipart/form-data">
    <div class="form-group">
        @csrf
      <input type="file" id="image" name="image" wire:model="image"><br>
      @error('image')
      {{ $message }}
      @enderror

      <label for="pwd">Comment<br></label>
      <textarea type="text" class="form-control"  placeholder="Enter text" name="text" wire:model.lazy='newComm'></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
  <br><br>
{{ $newComm }}
  @foreach($comments as $comment)

    {{ $comment->user->name }}
    {{ $comment->created_at->diffForHumans() }}<br>
    {{ $comment->body }}
    <button type="submit" class="btn btn-primary" wire:click='remove({{ $comment->id }})'>X</button>

    
    <hr>

  @endforeach
  {{ $comments->links('pagination-links') }}
</div>




