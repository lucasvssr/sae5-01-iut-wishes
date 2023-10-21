import * as React from "react";

export interface ITextProps {
  color?: string;
  fontWeight?:
    | "100"
    | "200"
    | "300"
    | "400"
    | "500"
    | "600"
    | "700"
    | "800 "
    | "900";
  fontSize?: string;
}

export const Text: React.FC<React.PropsWithChildren<ITextProps>> = ({
  children,
  color = "black",
  fontWeight,
  fontSize = "16px",
}) => {
  return (
    <p
      style={{
        fontWeight,
        color,
        margin: 0,
        fontSize,
      }}
    >
      {children}
    </p>
  );
};
