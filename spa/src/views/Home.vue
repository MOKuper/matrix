<template>
  <div id="home">
    <div class="bg-gray-800 pb-32">
      <header class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold text-white">
            ASICS enters the MATRIX
          </h1>
        </div>
      </header>
    </div>

    <main class="-mt-32">
      <div class="mx-auto pb-12 px-4 sm:px-6 lg:px-8">
        <div class=" bg-white rounded-lg shadow px-5 py-6 sm:px-6">
          <div
            class="border-4 border-dashed border-gray-200 rounded-lg h-auto p-12"
          >
            <div class="flex">
              <matrix-dimensions
                initial-rows="0"
                initial-columns="0"
                name="Matrix A"
                class="mr-4"
                @rowsUpdated="updateRowsMatrixA"
                @columnsUpdated="updateColumnsMatrixA"
              />
              <matrix-dimensions
                initial-rows="0"
                initial-columns="0"
                name="Matrix B"
                @rowsUpdated="updateRowsMatrixB"
                @columnsUpdated="updateColumnsMatrixB"
              />
              <div
                class="p-1 w-24 border border-gray-500 bg-blue-300 inline mt-6 h-11 ml-4 cursor-pointer"
                @click="getAnswer"
              >
                get answer
              </div>
              <div>
                <div class="flex items-center justify-center w-full mb-24 pt-8 pl-4">
                  <label for="toggle" class="flex items-center cursor-pointer">
                    <div class="relative">
                      <input
                        id="toggle"
                        type="checkbox"
                        class="hidden"
                        v-model="shouldConvertNum2Alpha"
                      />
                      <div
                        class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"
                      ></div>
                      <div
                        class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"
                      ></div>
                    </div>
                    <div class="ml-3 text-gray-700 font-medium">
                      output in characters
                    </div>
                  </label>
                </div>
              </div>
            </div>

            <div class="flex">
              <div
                class="bg-white shadow overflow-hidden sm:rounded-lg w-1/2"
                v-if="rowsMatrixA > 0 && columnsMatrixA > 0"
              >
                <div class="px-4 py-5 sm:px-6">
                  <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Matrix A
                  </h3>
                </div>
                <div class="border-t border-gray-200 px-4 py-24 sm:p-0">
                  <div id="matrix-container-a" class="inline">
                    <div v-for="row in rowsMatrixA" :key="row">
                      <template v-if="inputMatrixA[row - 1]">
                        <input
                          v-for="column in columnsMatrixA"
                          :key="column"
                          type="number"
                          v-model="inputMatrixA[row - 1][column - 1]"
                          class="w-24"
                        />
                      </template>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="bg-white shadow overflow-hidden sm:rounded-lg w-1/2"
                v-if="rowsMatrixB > 0 && columnsMatrixB > 0"
              >
                <div class="px-4 py-5 sm:px-6">
                  <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Matrix B
                  </h3>
                </div>
                <div class="border-t border-gray-200 px-4 py-24 sm:p-0">
                  <div id="matrix-container-b" class="inline">
                    <div v-for="row in rowsMatrixB" :key="row">
                      <template v-if="inputMatrixB[row - 1]">
                        <input
                          v-for="column in columnsMatrixB"
                          :key="column"
                          type="number"
                          v-model="inputMatrixB[row - 1][column - 1]"
                          class="w-24"
                        />
                      </template>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="bg-white shadow overflow-hidden sm:rounded-lg w-1/2"
              v-if="answerMatrix.length > 0"
            >
              <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Ze Answer (output)
                </h3>
              </div>
              <div class="border-t border-gray-200 px-4 py-24 sm:p-0">
                <div class="inline">
                  <div v-for="(row, key) in answerMatrix" :key="key">
                    <template>
                      <div class="flex">
                        <div
                          v-for="(value, key) in row"
                          :key="key"
                          type="number"
                          class="w-24"
                        >
                          {{ value }}
                        </div>
                      </div>
                    </template>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import MatrixDimensions from "@/views/MatrixDimensions.vue";
import axios from "vue-ts-axios";

@Component({ name: "Home", components: { MatrixDimensions } })
export default class Home extends Vue {
  rowsMatrixA: number = null;
  columnsMatrixA: number = null;
  rowsMatrixB: number = null;
  columnsMatrixB: number = null;

  answerMatrix = [];

  shouldConvertNum2Alpha = false;

  private inputMatrixA: number[][] = [];
  private inputMatrixB: number[][] = [];

  getAnswer() {
    axios
      .post(
        `http://127.0.0.1:8000/api/matrix/multiplication?convert=${this.shouldConvertNum2Alpha ? "yes": "no"}`,
        {
          data: {
            a: this.inputMatrixA,
            b: this.inputMatrixB
          }
        }
      )
      .then(response => {
        this.answerMatrix = response.data.data;
      });
  }

  updateRowsMatrixA(value) {
    this.rowsMatrixA = value;
    this.inputMatrixA.length = value;
    for (let i = 0; i < value; i++) {
      if (!this.inputMatrixA[i]) {
        this.inputMatrixA[i] = [];
      }
    }
  }

  updateColumnsMatrixA(value) {
    this.columnsMatrixA = value;
  }

  updateRowsMatrixB(value) {
    this.rowsMatrixB = value;
    this.inputMatrixB.length = value;
    for (let i = 0; i < value; i++) {
      if (!this.inputMatrixB[i]) {
        this.inputMatrixB[i] = [];
      }
    }
  }

  updateColumnsMatrixB(value) {
    this.columnsMatrixB = value;
  }
}
</script>

<style scoped>
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.toggle__dot {
  top: -0.25rem;
  left: -0.25rem;
  transition: all 0.3s ease-in-out;
}

input:checked ~ .toggle__dot {
  transform: translateX(100%);
  background-color: #48bb78;
}
</style>
