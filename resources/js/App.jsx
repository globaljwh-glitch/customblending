import React from "react";
import { createRoot } from "react-dom/client";
import Home from "./pages/Home";

const container = document.getElementById("app");
createRoot(container).render(<Home />);
