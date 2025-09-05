<div class="border-t border-gray-200 pt-4 mt-4">
    <div class="flex items-center justify-between mb-2">
        <span class="font-semibold text-lg">{{ $review->name }}</span>
        @if($review->published_at)
            <span class="text-gray-500 text-sm">{{ $review->published_at->diffForHumans() }}</span>
        @endif
    </div>
    <p class="text-gray-600 italic">{{ $review->description }}</p>
</div>
