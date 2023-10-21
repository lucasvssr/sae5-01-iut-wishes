import React, { useState, type PropsWithChildren } from "react";
import { Navbar } from "./UI/Navbar";
import { Button } from "@mui/material";

interface ExampleComponentProps {
  name: string;
}
export const ExampleComponent: React.FC<
  PropsWithChildren<ExampleComponentProps>
> = ({ name }) => {
  return (
    <div>
      <h1>{name}</h1>
      <p>React component</p>
    </div>
  );
};
