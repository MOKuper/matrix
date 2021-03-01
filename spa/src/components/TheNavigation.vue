<template>
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="border-b border-gray-700">
        <div class="flex items-center justify-between h-16 px-4 sm:px-0">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img
                class="h-8 w-8"
                src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                alt="Workflow"
              />
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <router-link
                  @click="isOpen = false"
                  v-for="link in links"
                  :key="link.label"
                  :to="link.destination"
                  :class="
                    isOpen
                      ? 'bg-gray-900 text-white'
                      : 'text-gray-300 hover:bg-gray-700 hover:text-white'
                  "
                  class="px-3 py-2 rounded-md text-sm font-medium uppercase"
                >
                  {{ link.label }}
                </router-link>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!--
      Mobile menu, toggle classes based on menu state.

      Open: "block", closed: "hidden"
    -->
    <div class="hidden border-b border-gray-700 md:hidden">
      <div class="px-2 py-3 space-y-1 sm:px-3">
        <router-link
          @click="isOpen = false"
          v-for="link in links"
          :key="link.label"
          :to="link.destination"
          :class="
            isOpen
              ? 'bg-gray-900 text-white'
              : 'text-gray-300 hover:bg-gray-700 hover:text-white'
          "
          class="px-3 py-2 rounded-md text-sm font-medium"
        >
          {{ link.label }}
        </router-link>
      </div>

    </div>
  </nav>
</template>
<script lang="ts">
import { Vue, Component, Prop } from "vue-property-decorator";

@Component
export default class TheNavigation extends Vue {
  private isOpen = false;
  private dropDownOpen = false;

  get links(): Array<object> {
    return [
      {
        destination: "/",
        label: "Home"
      }
    ];
  }
}
</script>
