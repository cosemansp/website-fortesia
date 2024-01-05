import { defineConfig } from "astro/config";
import { loadEnv } from "vite";
import storyblok from "@storyblok/astro";
import basicSsl from "@vitejs/plugin-basic-ssl";
import tailwind from "@astrojs/tailwind";
import vercelServerless from "@astrojs/vercel/serverless";
import vercelStatic from "@astrojs/vercel/static";

// https://astro.build/config
const env = loadEnv("", process.cwd(), "STORYBLOK");

const vercel = env.STORYBLOK_IS_PREVIEW === "yes" ? vercelServerless : vercelStatic;

export default defineConfig({
  integrations: [
    tailwind(),
    storyblok({
      apiOptions: {
        region: "eu",
      },
      accessToken: env.STORYBLOK_TOKEN,
      bridge: env.STORYBLOK_IS_PREVIEW === "yes",
      components: {
        page: "storyblok/Page",
        feature: "storyblok/Feature",
        grid: "storyblok/Grid",
        teaser: "storyblok/Teaser",
        hero: "storyblok/Hero",
        config: "storyblok/Config",
        article: "storyblok/Article",
        "popular-articles": "storyblok/PopularArticles",
        "all-articles": "storyblok/AllArticles",
      },
    }),
  ],
  output: env.STORYBLOK_IS_PREVIEW === "yes" ? "server" : "static",
  adapter: vercel({
    webAnalytics: {
      enabled: true,
    },
  }),
  ...(env.STORYBLOK_ENV === "development" && {
    vite: {
      plugins: [basicSsl()],
      server: {
        https: true,
      },
    },
  }),
});
