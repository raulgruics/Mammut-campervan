import { gsap } from "gsap";
import { EaselPlugin } from "gsap/EaselPlugin";

gsap.registerPlugin(EaselPlugin);

gsap.from('.text-block' , {duration: 1, y: '-100%', ease:'bounce' })