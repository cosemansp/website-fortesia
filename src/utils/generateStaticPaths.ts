import { useStoryblokApi } from "@storyblok/astro";
import isPreview from "./isPreview";
// import { languages } from "./langs";

let languages = ["en", "es"];

type Path = {
  props: {
    language: string;
    slug: string | undefined;
    langSwitch: Record<string, string>;
  };
  params: {
    slug: string | undefined;
  };
};

export default async function generateStaticPaths() {
  const storyblokApi = useStoryblokApi();
  const { data } = await storyblokApi.get("cdn/links", {
    version: isPreview() ? "draft" : "published",
  });
  let links = data.links;
  links = Object.values(links);
  const paths: Path[] = [];
  links.forEach((link: { slug: string }) => {
    languages.forEach((language) => {
      //This slug will be used for fetching data from storyblok
      let slug = link.slug === "home" ? undefined : link.slug;
      //This will be used for generating all the urls for astro
      let full_url = language === "en" ? slug : `${language}/${slug ?? ""}`;
      //This will let us change the url for different versions
      let langSwitch = {};
      languages.forEach((lang) => {
        langSwitch = {
          ...langSwitch,
          [lang]: lang === "en" ? `/${slug ?? ""}` : `/${lang}/${slug ?? ""}`,
        };
      });
      paths.push({
        props: { language, slug, langSwitch },
        params: {
          slug: full_url,
        },
      });
    });
  });
  return paths;
}
