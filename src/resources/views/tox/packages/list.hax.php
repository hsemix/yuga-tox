@extends('tox.layouts.layout')

@section('main-content')

<main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
          <div class="h-auto rounded-lg border-4 border-dashed border-gray-200 p-4">
            <!-- Plan switch -->
      <div class="flex items-center justify-center mt-10 space-x-4">
        <span class="text-base font-medium">Bill Monthly</span>
        <button
                class="relative rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                x-cloak
                @click="billPlan == 'monthly' ? billPlan = 'annually' : billPlan = 'monthly'"
                >
          <div class="w-16 h-8 transition bg-indigo-500 rounded-full shadow-md outline-none"></div>
          <div
              class="absolute inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform bg-white rounded-full shadow-sm top-1 left-1"
              :class="{ 'translate-x-0': billPlan == 'monthly', 'translate-x-8': billPlan == 'annually' }"
              ></div>
        </button>
        <span class="text-base font-medium">Bill Annually</span>
      </div>

      <!-- Plans -->
      <div class="flex flex-col items-center justify-center mt-16 space-y-8 lg:flex-row lg:items-stretch lg:space-x-8 lg:space-y-0">
        <template x-for="(plan, i) in plans" x-key="i">
          <section class="flex flex-col w-full max-w-sm p-12 space-y-6 bg-white rounded-lg shadow-md">
            <!-- Price -->
            <div class="flex-shrink-0">
              <span
                    class="text-4xl font-medium tracking-tight"
                    :class="plan.name == 'Basic' ? 'text-green-500' : ''"
                    x-text="`$${billPlan == 'monthly' ? plan.price.monthly : plan.price.annually}`"
                    ></span>
              <span class="text-gray-400" x-text="billPlan == 'monthly' ? '/month' : '/year'"></span>
            </div>

            <!--  -->
            <div class="flex-shrink-0 pb-6 space-y-2 border-b">
              <h2 class="text-2xl font-normal" x-text="plan.name"></h2>
              <p class="text-sm text-gray-400" x-text="plan.discretion"></p>
            </div>

            <!-- Features -->
            <ul class="flex-1 space-y-4">
              <template x-for="(feature, i) in plan.features" x-key="i">
                <li class="flex items-start">
                  <svg
                      class="w-6 h-6 text-green-300"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      >
                    <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                          />
                  </svg>
                  <span class="ml-3 text-base font-medium" x-text="feature"></span>
                </li>
              </template>
            </ul>

            <!-- Button -->
            <div class="flex-shrink-0 pt-4">
              <button
                      class="inline-flex items-center justify-center w-full max-w-xs px-4 py-2 transition-colors border rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                      :class="plan.name == 'Basic' ? 'bg-indigo-500 text-white hover:bg-indigo-700' : 'hover:bg-indigo-500 hover:text-white'"
                      x-text="`Get ${plan.name}`"
                      ></button>
            </div>
          </section>
        </template>
      </div>
            
          </div>
        </div>
        <!-- /End replace -->
      </div>
    </main>

@endsection

@section('scripts')
  <script>
      const setup = () => {
      return {
          isNavOpen: false,

          billPlan: 'monthly',

          plans: [
          {
              name: 'Easy',
              discretion: 'All the basics for businesses that are just getting started.',
              price: {
              monthly: 29,
              annually: 29 * 12 - 199,
              },
              features: ['One project', 'Your dashboard'],
          },
          {
              name: 'Basic',
              discretion: 'Better for growing businesses that want more customers.',
              price: {
              monthly: 59,
              annually: 59 * 12 - 100,
              },
              features: ['Two projects', 'Your dashboard', 'Components included', 'Advanced charts'],
          },
          {
              name: 'Custom',
              discretion: 'Advanced features for pros who need more customization.',
              price: {
              monthly: 139,
              annually: 139 * 12 - 100,
              },
              features: ['Unlimited projects', 'Your dashboard', '+300 Components', 'Chat support'],
          },
          ],
      }
  }
  </script>
@endsection