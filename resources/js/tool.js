import CustomIndexToolbar from "./components/CustomIndexToolbar";

Nova.booting((Vue, router, store) => {
    Vue.component("custom-index-toolbar", CustomIndexToolbar);
});
