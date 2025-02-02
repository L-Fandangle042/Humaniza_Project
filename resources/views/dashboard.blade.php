<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> -->
                <h1 class="px-10 pt-8 text-3xl">Form</h1>

                <div>

                    <form class="p-10">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required />
                            </div>

                            <!-- <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                                <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                            </div> -->

                            <div>
                                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                                <div class="relative mb-6">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@website.com">
                                </div>
                            </div>
                        </div>

                        <!-- <br> -->
                        @foreach($form as $f)

                        @if($f['type'] === 'brand')
                        <label for="variety" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $f['question'] }}</label>

                        <select name="brand" onchange="this.form.submit()" required class="bg-gray-50 border border-gray-350 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>--- Select brand ---</option>
                            @foreach($brands as $brand => $varieties)
                            <option value="{{ $brand }}" {{ request('brand') == $brand ?  'selected' : '' }}>
                                {{ $brand }}
                            </option>
                            @endforeach
                        </select>

                        @elseif($f['type'] === 'variety' && $selectedBrand)
                        <label for="variety" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $f['question'] }}</label>
                        <select name="variety" required class="bg-gray-50 border border-gray-350 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>--- Select variety --- </option>
                            @foreach($brands[$selectedBrand] as $variety)
                            <option value="{{  $variety }}">{{ $variety }}</option>
                            @endforeach
                        </select>
                        @elseif($f['type'] === 'alternative')
                        <label for="variety" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $f['question'] }}</label>
                        <select name="brand" required class="bg-gray-50 border border-gray-350 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>--- Select brand ---</option>
                            <option value="none" {{ request('brand') == 'none' ? 'selected' : '' }}>None</option> <!-- Add "None" option -->
                            @foreach($brands as $brand => $varieties)
                            @if($brand != $selectedBrand) <!-- Exclude the selected brand -->
                            <option value="{{ $brand }}" {{ request('brand') == $brand ?  'selected' : '' }}>
                                {{ $brand }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                        @elseif($f['type'] === 'purchase')
                        <div class="flex items-center">
                            <div>
                                <label class="inline-flex items-center mr-4">
                                    <input type="radio" name="purchase" value="true" required class="form-radio text-blue-500">
                                    <span class="ml-2">Yes</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="purchase" value="false" required class="form-radio text-red-500">
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                        </div>
                        @endif
                        <br>
                        @endforeach


                        <br>
                        <!-- Checkbox Agreement -->
                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit</button>

                        <!-- Reset Button -->
                        <button type="reset" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Reset
                        </button>
                    </form>


                    <!-- <form method="POST">
                        
                        <h3>Question 1: What is your favorite brand of cigarettes?</h3>
                        <input type="radio" name="question1" value="red"> Marlboro<br>
                        <input type="radio" name="question1" value="blue"> Chesterfield<br>
                        <input type="radio" name="question1" value="green"> L&M<br>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>