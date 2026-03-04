@extends('statamic::layout')


@section('content')
    <!-- Header Content -->
    <section>
        <h1 class="mb-2">All Seo you need</h1>
        <p>Default SEO settings, for the website and collections.</p>
    </section>
    <!-- End Header Content -->


<script>
import { PublishForm } from '@statamic/cms/ui';
</script>
<template>
    <PublishForm
        :blueprint="blueprint"
        :meta="meta"
        :errors="errors"
        v-model="values"
    />
</template>

@endsection
