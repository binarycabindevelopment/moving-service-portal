<?php $groupKey = 'group-'.rand(0,100000); ?>
<div>
    <a href="javascript:;" v-on:click="toggleSidebarCurrentGroup('{{ $groupKey }}')" class="flex justify-between px-4 py-4 text-brand hover:text-brand-dark hover:bg-grey-lighter no-underline">
        <div class="flex-1">
            {!! $title !!}
        </div>
        <div>
            <i class="fas fa-chevron-down" v-if="sidebarCurrentGroup=='{{ $groupKey }}'"></i>
            <i class="fas fa-chevron-right" v-if="sidebarCurrentGroup!='{{ $groupKey }}'"></i>
        </div>
    </a>
    <transition name="slide">
        <div class="bg-grey-lightest overflow-hidden slide-transition-element" v-if="sidebarCurrentGroup=='{{ $groupKey }}'">
            {!! $slot !!}
        </div>
    </transition>
</div>