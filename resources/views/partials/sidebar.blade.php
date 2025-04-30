<div class="col-lg-4">
<div class="sidebar">

    <h3 class="sidebar-title text-capitalize">cari</h3>
    <div class="sidebar-item search-form">
      <form action="/berita">
        @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
        <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <input type="text" name="search" placeholder="Cari.." value="{{ request('search') }}">
        <button type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End sidebar search formn-->

    <h3 class="sidebar-title text-capitalize">Kategori</h3>
    <div class="sidebar-item categories text-capitalize">
      <ul>
        @foreach($categories as $category)
        <li><a href="/berita?category={{ $category->slug }}">{{ $category->name }} <span></span></a></li>
        @endforeach
      </ul>
    </div><!-- End sidebar categories-->

    <h3 class="sidebar-title">Posting Terbaru</h3>
    <div class="sidebar-item recent-posts">
      @foreach ($beritabaru as $baru)
      <div class="post-item clearfix">
        @if($baru->image)
        <img src="{{ asset('storage/'.$baru->image) }}" alt="" class="img-fluid rounded">
        @else
        <img src="https://picsum.photos/300/200/?blur" alt="" class="img-fluid rounded">
        @endif
        
        <h4><a href="/posts/{{ $baru->slug }}">{{ $baru->title }}</a></h4>
        <time datetime="2020-01-01">{{ $baru->created_at->locale('id')->isoFormat('MMM Do, YYYY') }}</time>
      </div>
      @endforeach
    </div><!-- End sidebar recent posts
    <h3 class="sidebar-title">Tags</h3>
    <div class="sidebar-item tags">
      <ul>
        <li><a href="#">App</a></li>
        <li><a href="#">IT</a></li>
        <li><a href="#">Business</a></li>
        <li><a href="#">Mac</a></li>
        <li><a href="#">Design</a></li>
        <li><a href="#">Office</a></li>
        <li><a href="#">Creative</a></li>
        <li><a href="#">Studio</a></li>
        <li><a href="#">Smart</a></li>
        <li><a href="#">Tips</a></li>
        <li><a href="#">Marketing</a></li>
      </ul>
    </div> End sidebar tags-->

  </div><!-- End sidebar -->
</div><!-- End blog sidebar -->