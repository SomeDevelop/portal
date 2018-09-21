<div class="col-lg-4 col-lg-offset-2" data-sticky_column>

    <aside class="widget">
        <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>





        <div>

            <a href="#" class="popular-img"><img src="../assets/images/p1.jpg" alt="">

                <div class="p-overlay"></div>
            </a>

            <div class="p-content">
                <a href="#" class="text-uppercase">Home is peaceful Place</a>
                <span class="p-date">February 15, 2016</span>
            </div>
        </div>
        <div class="popular-post">


            <a href="#" class="popular-img"><img src="../assets/images/p1.jpg" alt="">

                <div class="p-overlay"></div>
            </a>

            <div class="p-content">
                <a href="#" class="text-uppercase">Home is peaceful Place</a>
                <span class="p-date">February 15, 2016</span>
            </div>
        </div>
    </aside>
    <aside class="widget border pos-padding">
        <h3 class="widget-title text-uppercase text-center">Categories</h3>
        <ul>
            @forelse($categories as $category)
                <li>
                    <a href="#">{{$category->title}}</a>
                    <span class="post-count pull-right"> {{$category->courses()->count()}}</span>
                </li>
            @empty
                <p>No category created.</p>
            @endforelse
        </ul>
    </aside>
</div>