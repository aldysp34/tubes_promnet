<template>
    <div>
        <!-- Top Bar Nav -->
        <nav class="w-full py-4 bg-blue-800 shadow">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

                <nav>
                    <!-- <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="#">Shop</a></li>
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="#">About</a></li>
                    </ul> -->
                </nav>

                <div class="flex items-center text-lg no-underline text-white pr-6">
                    <a class="pl-6" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

        </nav>

        <!-- Text Header -->
        <header class="w-full container mx-auto">
            <div class="flex flex-col items-center py-12">
                <inertia-link class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" :href="'/'">
                    Sixtecode
                </inertia-link>
                
            </div>
        </header>

        <!-- Topic Nav -->
        <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
            <div class="block sm:hidden">
                <a
                    href="#"
                    class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                    @click="open = !open"
                >
                    Topics <i class="fas ml-2"></i>
                </a>
            </div>
            <div class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
                <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                    <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Home</a>
                    <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Tutorial</a>
                    <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Video</a>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="container mx-auto flex flex-wrap py-6">

            <!-- Posts Section -->
            <section class="w-full md:w-2/3 flex flex-col items-center px-3">
                <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
            </section>

            <!-- Sidebar Section -->
            <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

                <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5">About Us</p>
                    <p class="pb-2">Sixtecode adalah tempat belajar berbagai bahasa pemrograman berbasis website dan video. </p>
                    <a href="https://www.instagram.com/23rdpine/" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                        Get to know us
                    </a>
                </div>
                <!-- <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5">Meta</p>
                    <ul class="list-disc pl-4" v-if="!$page.props.auth.user">
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    </ul>
                    <ul class="list-disc pl-4" v-if="$page.props.auth.user">
                        <li>You are looged in as : {{user.email}}</li>
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><inertia-link method="post" href="/logout">Logout</inertia-link></li>
                    </ul>
                </div> -->

            </aside>

        </div>

        <!-- Footer -->
        <footer class="footer bg-white relative pt-1 border-b-2 border-blue-700">
            <div class="container mx-auto px-6">
                <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
                    <div class="sm:w-2/3 text-center py-6">
                        <p class="text-sm text-blue-900 font-bold mb-2">
                            &copy; 2021 by Sixte
                        </p>
                        <p class="text-sm text-blue-700 font-bold mb-2">
                            Education Indonesia University 2019
                        </p>
                        <!-- w-full sm:w-1/5 flex items-end mb-2 -->
                        <div class="text-sm text-blue-700 font-bold mb-2 space-x-4">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href="https://instagram.com/aldysp34"><i class="fab fa-instagram"></i></a>
                                <a href="https://github.com/aldysp34"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    import { computed } from 'vue'
    import { usePage } from '@inertiajs/inertia-vue3'

    export default {
        setup() {
            const user = computed(() => usePage().props.value.auth.user)
            return { user }
        }
    }
</script>
