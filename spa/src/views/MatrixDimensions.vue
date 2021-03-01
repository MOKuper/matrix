<template>
  <fieldset class="inline">
    <legend>
      {{ name }}
    </legend>
    <input
        class="w-24"
        type="number"
        id="rows"
        name="rows"
        v-model="rows"
    />
    X
    <input
      class="w-24"
      type="number"
      name="columns"
      id="columns"
      v-model="columns"
    />
  </fieldset>
</template>
<script lang="ts">
export default {
  name: "matrix-dimensions",
  data() {
    return {
      rows: {},
      columns: {}
    };
  },
  mounted() {
    this.rows = this.initialRows;
    this.columns = this.initialColumns;
  },
  watch: {
    rows: function(val) {
      this.$emit('rowsUpdated', Number(val));
    },
    columns: function(val) {
      this.$emit('columnsUpdated', Number(val));
    },
  },
  props: {
    name: String,
    initialRows: {},
    initialColumns: {}
  },
};
</script>
