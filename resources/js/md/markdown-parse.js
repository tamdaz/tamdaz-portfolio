import hljs from "highlight.js";
import("highlight.js/styles/github-dark-dimmed.css");

hljs.highlightAll()
hljs.addPlugin(new CopyButtonPlugin())