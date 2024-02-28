<x-app-layout title="Report">
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <span class="text-blue-900 text-2xl font-bold">Generate Report for TBI Activities</span>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form>
                <div class="mb-4">
                    <x-label class="font-semibold" for="date" value="{{ __('Date') }}" />
                </div>
                <div class="mb-4">
                    <select class="rounded-2xl text-center" id="monthDropdown">
                        <option value="">Select a month</option>
                        @for ($month = 1; $month <= 12; $month++)
                            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                        @endfor
                    </select>
                    <select class="rounded-2xl text-center" id="yearDropdown">
                        <option value="">Select a year</option>
                        @for ($year = date('Y'); $year >= 2023; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ms-4">
                        {{ __('Generate Report') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
