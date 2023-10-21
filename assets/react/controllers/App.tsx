import React from "react";
import { ExampleComponent } from "../components/ExampleComponent";
import { Routes, Route, BrowserRouter } from "react-router-dom";
import { Layout } from "../components/UI/Layout";
import { TOS } from "../pages/TOS";
const App: React.FC = () => (
  <BrowserRouter>
    <div className="app">
      <Routes>
        <Route path="/react" element={<Layout />}>
          <Route
            path="/react/compte"
            element={<ExampleComponent name="React 1" />}
          />
          <Route path="/react/conditions" element={<TOS />} />
          <Route
            path="/react/voeux"
            element={<ExampleComponent name="React 2" />}
          />
          <Route
            path="/react/historique"
            element={<ExampleComponent name="React 3" />}
          />
        </Route>
      </Routes>
    </div>
  </BrowserRouter>
);

export default App;
