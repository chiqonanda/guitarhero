@props(['article'])

@php
    $imageSrc = $article->image ? (\Illuminate\Support\Str::startsWith($article->image, 'http') ? $article->image : asset('storage/' . $article->image)) : 'https://images.unsplash.com/photo-1510915361894-db8b60106cb1?q=80&w=800';
    if ($article->image === 'article1.jpg') $imageSrc = 'https://images.unsplash.com/photo-1510915361894-db8b60106cb1?q=80&w=800';
    if ($article->image === 'article2.jpg') $imageSrc = 'https://images.unsplash.com/photo-1525201548942-d8b8967d0a57?q=80&w=800';
    if ($article->image === 'article3.jpg') $imageSrc = 'https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=800';
    if ($article->image === 'article4.jpg') $imageSrc = 'https://images.unsplash.com/photo-1516924962500-2b4b3b99ea02?q=80&w=800';
    if ($article->image === 'article5.jpg') $imageSrc = 'https://images.unsplash.com/photo-1485278537138-4e8911a13c02?q=80&w=800';
    if ($article->image === 'article6.jpg') $imageSrc = 'https://images.unsplash.com/photo-1550985616-10810253b84d?q=80&w=800';
    if ($article->image === 'article7.jpg') $imageSrc = 'https://images.unsplash.com/photo-1520166012956-add9ba0835cb?q=80&w=800';
    if ($article->image === 'article8.jpg') $imageSrc = 'https://images.unsplash.com/photo-1598125557202-996e56f4bab8?q=80&w=800';
    $badge = $article->category->name;
    if ($article->title === 'The 2024 Shredder\'s Axe Guide') $badge = 'NEW REVIEW';
    if ($article->title === 'Capturing Heavy Guitars at Home') $badge = 'TUTORIAL';
    if ($article->title === 'Boutique Builders to Watch') $badge = 'NEWS';
    if ($article->title === 'The Evolution of High-Gain Amps' || $article->title === 'The Evolution of the Modern High-Gain Amp') $badge = 'TECH DEEP DIVE';
@endphp

<article class="bg-[#1A1A1A] border border-zinc-800 rounded-lg overflow-hidden flex flex-col group hover:border-zinc-700 transition-all duration-300 shadow-lg hover:shadow-yellow-400/5">
    <div class="relative overflow-hidden aspect-video">
        <img src="{{ $imageSrc }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
        <span class="absolute top-4 left-4 bg-yellow-400 text-black text-[9px] font-black tracking-widest px-2.5 py-1 uppercase rounded-sm font-mono">
            {{ $badge }}
        </span>
    </div>
    <div class="p-6 flex-1 flex flex-col justify-between">
        <div class="space-y-3">
            <h3 class="text-lg font-bold text-white group-hover:text-yellow-400 transition-colors duration-200 line-clamp-2">
                <a href="{{ route('articles.show', $article->slug) }}">
                    {{ $article->title }}
                </a>
            </h3>
            <p class="text-zinc-400 text-sm line-clamp-3 leading-relaxed">
                {{ Str::limit($article->content, 120) }}
            </p>
        </div>
        <div class="flex items-center justify-between pt-6 border-t border-zinc-800/80 mt-6 text-[11px] text-zinc-500 uppercase tracking-widest font-mono">
            <span>BY {{ $article->author->name }}</span>
            <span>{{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}</span>
        </div>
    </div>
</article>
