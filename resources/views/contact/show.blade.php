<x-guest-layout>
    <div class="max-w-7xl mx-auto mt-8">

<div class="overflow-hidden bg-white py-16 px-6 lg:px-8 lg:py-24">
  <div class="relative mx-auto max-w-xl">
    <svg class="absolute left-full translate-x-1/2 transform" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
      <defs>
        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
    </svg>
    <svg class="absolute right-full bottom-0 -translate-x-1/2 transform" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
      <defs>
        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
    </svg>
    <div class="text-center">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contact sales</h2>
      <p class="mt-4 text-lg leading-6 text-gray-500">Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.</p>
    </div>
    <div class="mt-12">
      <form action="{{ route('contact.show')}}" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
        @csrf
        <div>
          <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
          <div class="mt-1">
            <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
          </div>
        </div>
        <div>
          <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
          <div class="mt-1">
            <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <div class="mt-1">
            <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
          <div class="mt-1">
            <textarea id="message" name="message" rows="4" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
          </div>
        </div>
        
        <div class="sm:col-span-2">
          <button type="submit" class="inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Let's talk</button>
        </div>
      </form>
    </div>
  </div>
</div>

    </div>
</x-guest-layout>