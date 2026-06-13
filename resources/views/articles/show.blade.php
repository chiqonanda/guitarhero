<x-app-layout>
    @section('title', $article->title . ' - Guitar Hero')

    @php
        $imageSrc = $article->image ? (\Illuminate\Support\Str::startsWith($article->image, 'http') ? $article->image : asset('storage/' . $article->image)) : 'https://images.unsplash.com/photo-1510915361894-db8b60106cb1?q=80&w=800';
        if ($article->image === 'article1.jpg') $imageSrc = 'https://images.unsplash.com/photo-1598125557202-996e56f4bab8?q=80&w=1600';
        if ($article->image === 'article2.jpg') $imageSrc = 'https://images.unsplash.com/photo-1525201548942-d8b8967d0a57?q=80&w=1200';
        if ($article->image === 'article3.jpg') $imageSrc = 'https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=1200';
        if ($article->image === 'article4.jpg') $imageSrc = 'https://images.unsplash.com/photo-1516924962500-2b4b3b99ea02?q=80&w=1200';
        if ($article->image === 'article5.jpg') $imageSrc = 'https://images.unsplash.com/photo-1485278537138-4e8911a13c02?q=80&w=1200';
        if ($article->image === 'article6.jpg') $imageSrc = 'https://images.unsplash.com/photo-1550985616-10810253b84d?q=80&w=1200';
        if ($article->image === 'article7.jpg') $imageSrc = 'https://images.unsplash.com/photo-1520166012956-add9ba0835cb?q=80&w=1200';
        if ($article->image === 'article8.jpg') $imageSrc = 'https://images.unsplash.com/photo-1598125557202-996e56f4bab8?q=80&w=1200';

        $badge = $article->category->name;
        $readTime = max(1, round(str_word_count(strip_tags($article->content)) / 120));
        
        if ($article->title === 'The Evolution of High-Gain Amps' || $article->title === 'The Evolution of the Modern High-Gain Amp') {
            $badge = 'TECH DEEP DIVE';
            $readTime = 12;
        }
    @endphp

    <!-- Wide Hero Header Banner -->
    <section class="relative h-[65vh] flex items-end justify-center bg-black overflow-hidden border-b border-zinc-900">
        <!-- Image Background with Dark Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ $imageSrc }}" alt="{{ $article->title }}" class="w-full h-full object-cover filter grayscale contrast-125 brightness-[0.7]" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#0D0D0D] via-transparent to-black/40 z-10"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#0D0D0D]/90 via-transparent to-[#0D0D0D]/90 z-10"></div>
        </div>

        <!-- Hero Content Overlay -->
        <div class="relative z-20 max-w-4xl mx-auto w-full px-4 sm:px-6 lg:px-8 pb-16 space-y-5">
            <!-- Tag & Read Time -->
            <div class="flex items-center space-x-3 text-xs font-bold font-mono tracking-widest text-zinc-400">
                <span class="bg-yellow-400 text-black px-2.5 py-1 rounded-sm uppercase font-black">
                    {{ $badge }}
                </span>
                <span>•</span>
                <span class="text-zinc-300 font-medium uppercase font-mono">{{ $readTime }} Min Read</span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl sm:text-6xl font-black text-white leading-tight uppercase font-display select-none">
                {{ $article->title }}
            </h1>

            <!-- Author Info -->
            <div class="flex items-center space-x-3 pt-2">
                <div class="h-9 w-9 rounded-full bg-zinc-800 flex items-center justify-center font-bold text-xs text-yellow-400 border border-zinc-700">
                    {{ substr($article->author->name, 0, 1) }}
                </div>
                <div class="text-[11px] font-mono uppercase tracking-widest">
                    <p class="font-bold text-white">BY {{ $article->author->name }}</p>
                    <p class="text-zinc-500 pt-0.5">{{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Container -->
    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @if ($article->slug === 'the-evolution-of-high-gain-amps' || $article->slug === 'the-evolution-of-the-modern-high-gain-amp')
            <!-- Custom High-Fidelity Mockup Content -->
            <div class="text-zinc-300 text-base sm:text-lg leading-relaxed space-y-8 font-sans">
                <p>
                    The quest for the ultimate distortion has driven amplifier design for over half a century. From the pushed tweed circuits of the 50s to the cascaded gain stages that define today's brutalist metal tones, the high-gain amplifier is a testament to human engineering's desire for sonic extremity.
                </p>

                <h3 class="text-xl font-extrabold text-yellow-400 uppercase tracking-widest font-display pt-6">THE PREAMP REVOLUTION</h3>
                <p>
                    Before the late 70s, "gain" meant turning your amp all the way up and hoping the speakers didn't blow. The revolutionary shift occurred when designers began placing multiple 12AX7 tubes in series within the preamp section. This allowed the signal to clip and compress before it ever reached the power section, offering scorching distortion at manageable volumes.
                </p>
                <p>
                    It wasn't just about more gain; it was about shaping it. Tone stacks shifted from post-distortion to pre-distortion, completely altering how an amp felt under the fingers. Tight, percussive low-end response became the new standard for aggressive playing styles.
                </p>

                <!-- Custom Blockquote -->
                <blockquote class="bg-[#121212] border-l-4 border-yellow-400 p-8 my-10 rounded-r-md">
                    <p class="text-lg font-medium text-white italic leading-relaxed">
                        "We weren't trying to make it louder; we were trying to make it angrier. The cascading gain stages let the guitar breathe fire while the power section remained tightly controlled."
                    </p>
                    <footer class="mt-4 text-xs font-bold text-yellow-400 uppercase tracking-widest font-mono">
                        — Dave Friedman, Amp Designer
                    </footer>
                </blockquote>

                <h3 class="text-xl font-extrabold text-yellow-400 uppercase tracking-widest font-display pt-6">SILICON ENTERS THE CHAT</h3>
                <p>
                    While purists argue for all-tube signal paths, modern high-gain owes much to solid-state components. Diode clipping circuits, often integrated directly into the preamp, provided a sharp, immediate attack that tubes alone struggled to deliver. This hybrid approach paved the way for the ultra-tight response required by modern extended-range guitarists.
                </p>

                <!-- Key Specification Shift Box -->
                <div class="bg-[#121212] border border-zinc-800 rounded-lg p-8 my-10 space-y-6">
                    <h4 class="text-xs font-black text-yellow-400 uppercase tracking-widest font-mono">KEY SPECIFICATION SHIFT (1980 VS 2020)</h4>
                    <div class="space-y-4">
                        <!-- Spec 1: Gain Stages -->
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs font-bold uppercase tracking-wider text-zinc-300 font-mono">
                                <span>Gain Stages</span>
                                <span class="text-zinc-500">From 2 to 6+</span>
                            </div>
                            <div class="w-full bg-zinc-950 h-2 rounded-full overflow-hidden border border-zinc-850">
                                <div class="bg-yellow-400 h-full w-[85%] rounded-full shadow-[0_0_8px_rgba(250,204,21,0.3)]"></div>
                            </div>
                        </div>
                        <!-- Spec 2: Low Frequency Tightness -->
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs font-bold uppercase tracking-wider text-zinc-300 font-mono">
                                <span>Low Frequency Tightness</span>
                                <span class="text-zinc-500">Massive Increase</span>
                            </div>
                            <div class="w-full bg-zinc-950 h-2 rounded-full overflow-hidden border border-zinc-850">
                                <div class="bg-yellow-400 h-full w-[95%] rounded-full shadow-[0_0_8px_rgba(250,204,21,0.3)]"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <p>
                    Today, digital modeling has captured these nuances with terrifying accuracy, but the visceral punch of a 100-watt tube head pushing air through a 4x12 cabinet remains the benchmark. The evolution continues, driven by players demanding tighter lows, richer harmonics, and unapologetic power.
                </p>
            </div>
        @else
            <!-- Standard Dynamic Content -->
            <div class="text-zinc-300 text-base sm:text-lg leading-relaxed space-y-8 font-sans">
                {!! nl2br(e($article->content)) !!}
            </div>
        @endif
    </section>

    <!-- Related Stories -->
    @if($relatedArticles->count() > 0)
        <section class="bg-[#070707] border-t border-zinc-900 py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <h2 class="text-3xl font-black text-white uppercase tracking-wider font-display text-center md:text-left">
                    Related Stories
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedArticles as $related)
                        <x-article-card :article="$related" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-app-layout>
