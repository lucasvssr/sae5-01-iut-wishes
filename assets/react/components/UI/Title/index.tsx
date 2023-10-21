import * as React from "react";

export const Title: React.FC<React.PropsWithChildren> = ({ children }) => {
  return <h1 className="title">{children}</h1>;
};
