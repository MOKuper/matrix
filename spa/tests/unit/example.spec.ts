import { expect } from "chai";
import { shallowMount } from "@vue/test-utils";
import TheNavigation from "../../../technical-assessment-matthew-webrtc/src/components/TheNavigation.vue";

describe("TheNavigation.vue", () => {
  it("renders props.msg when passed", () => {
    const msg = "new message";
    const wrapper = shallowMount(TheNavigation, {
      propsData: { msg }
    });
    expect(wrapper.text()).to.include(msg);
  });
});
