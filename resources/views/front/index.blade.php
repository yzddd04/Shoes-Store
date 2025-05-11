<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{asset('output.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    </head>
    <body>
        <div class="relative flex flex-col w-full max-w-[640px] min-h-screen gap-5 mx-auto bg-[#F5F5F0]">
            <div id="top-bar" class="flex justify-between items-center px-4 mt-[60px]">
                <img src="{{asset('assets/images/logos/logo.svg') }}" class="flex shrink-0" alt="logo">
                <a href="#">
                    <img src="{{asset('assets/images/icons/notification.svg') }}" class="w-10 h-10" alt="icon">
                </a>
            </div>
            <form class="flex justify-between items-center mx-4">
                <div class="relative flex items-center w-full rounded-l-full px-[14px] gap-[10px] bg-white transition-all duration-300 focus-within:ring-2 focus-within:ring-[#FFC700]">
                    <img src="{{asset('assets/images/icons/search-normal.svg') }}" class="w-6 h-6" alt="icon">
                    <input type="text" class="w-full py-[14px] appearance-none bg-white outline-none font-semibold placeholder:font-normal placeholder:text-[#878785]" placeholder="Search product...">
                </div>
                <button type="submit" class="h-full rounded-r-full py-[14px] px-5 bg-[#C5F277]">
                    <span class="font-semibold">Explore</span>
                </button>
            </form>
            <section id="category" class="flex flex-col gap-4 px-4">
                <div class="flex items-center justify-between">
                    <h2 class="font-bold leading-[20px]">Our Featured <br>Categories</h2>
                    <a href="category.html" class="rounded-full p-[6px_14px] border border-[#2A2A2A] text-xs leading-[18px]">
                        View All
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-4">

                    @forelse ($categories as $itemCategory)
                        <a href="{{ route('front.category', $itemCategory->slug) }}">
                            <div class="flex items-center justify-between w-full rounded-2xl overflow-hidden bg-white transition-all duration-300 hover:ring-2 hover:ring-[#FFC700]">
                                <div class="flex flex-col gap-[2px] px-[14px]">
                                    <h3 class="font-bold text-sm leading-[21px]">
                                        {{ $itemCategory->name }}
                                    </h3>
                                    <p class="text-xs leading-[18px] text-[#878785]">
                                        {{ $itemCategory->shoes->count()}} Shoes
                                    </p>
                                </div>
                                <div class="flex shrink-0 w-20 h-[90px] overflow-hidden">
                                    <img src="{{ Storage::url($itemCategory->icon) }}" class="w-full h-full object-cover object-left" alt="thumbnail">
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>Belum ada data terbaru...</p>
                    @endforelse

                </div>
            </section>
            <section id="featured" class="flex flex-col gap-4">
                <div class="flex items-center justify-between px-4">
                    <h2 class="font-bold leading-[20px]">Explore Our <br>Featured</h2>
                    <a href="#" class="rounded-full p-[6px_14px] border border-[#2A2A2A] text-xs leading-[18px]">
                        View All
                    </a>
                </div>
                <div class="swiper w-full overflow-hidden">
                    <div class="swiper-wrapper">
                        @forelse ($popularShoes as $itemPopularShoe)
                            <div class="swiper-slide !w-fit py-[2px]">
                                    <a href="{{ route('front.details', $itemPopularShoe->slug) }}">
                                        <div class="flex flex-col shrink-0 w-[230px] h-full rounded-3xl gap-[14px] p-[10px] pb-4 bg-white transition-all duration-300 hover:ring-2 hover:ring-[#FFC700]">
                                            <div class="w-[210px] h-[230px] rounded-3xl bg-[#D9D9D9] overflow-hidden">
                                                <img src="{{ Storage::url($itemPopularShoe->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                                            </div>
                                            <div class="flex flex-col gap-[14px] justify-between">
                                                <div class="flex items-center justify-between gap-4">
                                                    <h3 class="font-bold leading-[20px]">
                                                        {{ $itemPopularShoe->name }}
                                                    </h3>
                                                    <p class="font-bold text-sm leading-[21px] text-nowrap">
                                                        Rp {{ number_format($itemPopularShoe->price, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                                <div class="flex items-center justify-between gap-2">
                                                    <div class="flex items-center gap-1">
                                                        <img src="{{asset('assets/images/icons/Star 1.svg') }}" class="w-[22px] h-[22px]" alt="star">
                                                        <p class="font-semibold text-sm leading-[21px]">4.5</p>
                                                    </div>
                                                    <p class="text-sm leading-[21px] text-[#878785]">(18,485 reviews)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                            </div>
                        @empty
                            <p>Belum ada data terbaru...</p>
                        @endforelse
                    </div>
                </div>
            </section>
            <section id="fresh" class="flex flex-col gap-4 px-4">
                <div class="flex items-center justify-between">
                    <h2 class="font-bold leading-[20px]">Fresh From <br>Great Designers</h2>
                    <a href="#" class="rounded-full p-[6px_14px] border border-[#2A2A2A] text-xs leading-[18px]">
                        View All
                    </a>
                </div>
                <div class="flex flex-col gap-4">

                    @forelse ( $newShoes as $itemNewShoe)
                        <a href="{{ route('front.details', $itemPopularShoe->slug) }}">
                            <div class="flex items-center rounded-3xl p-[10px_16px_16px_10px] gap-[14px] bg-white transition-all duration-300 hover:ring-2 hover:ring-[#FFC700]">
                                <div class="w-20 h-20 flex shrink-0 rounded-2xl bg-[#D9D9D9] overflow-hidden">
                                    <img src="{{ Storage::url($itemNewShoe->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                                </div>
                                <div class="flex w-full items-center justify-between gap-[14px]">
                                    <div class="flex flex-col gap-[6px]">
                                        <h3 class="font-bold leading-[20px]">
                                            {{ $itemNewShoe->name }}
                                        </h3>
                                        <p class="text-sm leading-[21px] text-[#878785]">
                                            {{ $itemNewShoe->category->name }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col gap-1 items-end shrink-0">
                                        <div class="flex">
                                            <img src="{{asset('assets/images/icons/Star 1.svg') }}" class="w-[18px] h-[18px] flex shrink-0" alt="star">
                                            <img src="{{asset('assets/images/icons/Star 1.svg') }}" class="w-[18px] h-[18px] flex shrink-0" alt="star">
                                            <img src="{{asset('assets/images/icons/Star 1.svg') }}" class="w-[18px] h-[18px] flex shrink-0" alt="star">
                                            <img src="{{asset('assets/images/icons/Star 1.svg') }}" class="w-[18px] h-[18px] flex shrink-0" alt="star">
                                            <img src="{{asset('assets/images/icons/Star 1.svg') }}" class="w-[18px] h-[18px] flex shrink-0" alt="star">
                                        </div>
                                        <p class="font-semibold text-sm leading-[21px]">4.5</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>Belum ada data terbaru...</p>
                    @endforelse

                </div>
            </section>
            <div id="bottom-nav" class="relative flex h-[100px] w-full shrink-0">
                <nav class="fixed bottom-5 w-full max-w-[640px] px-4 z-30">
                    <div class="grid grid-flow-col auto-cols-auto items-center justify-between rounded-full bg-[#2A2A2A] p-2 px-[30px]">
                        <a href="index.html" class="active flex shrink-0 -mx-[22px]">
                            <div class="flex items-center rounded-full gap-[10px] p-[12px_16px] bg-[#C5F277]">
                                <img src="{{asset('assets/images/icons/3dcube.svg') }}" class="w-6 h-6" alt="icon">
                                <span class="font-bold text-sm leading-[21px]">Browse</span>
                            </div>
                        </a>
                        <a href="check-booking.html" class="mx-auto w-full">
                            <img src="{{asset('assets/images/icons/bag-2-white.svg') }}" class="w-6 h-6" alt="icon">
                        </a>
                        <a href="#" class="mx-auto w-full">
                            <img src="{{asset('assets/images/icons/star-white.svg') }}" class="w-6 h-6" alt="icon">
                        </a>
                        <a href="#" class="mx-auto w-full">
                            <img src="{{asset('assets/images/icons/24-support-white.svg') }}" class="w-6 h-6" alt="icon">
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="{{ asset('js/index.js') }}"></script>
    </body>
</html>
