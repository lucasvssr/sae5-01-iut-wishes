import * as React from "react";
import { Badge } from "../Badge";

export interface IUserProps {
  image?: { src: string; alt: string };
  firstname: string;
  lastname: string;
  email: string;
  phone?: string;
  type?: "teacher" | "tempWorker" | "admin";
}

export const User: React.FC<IUserProps> = ({
  image = { src: "", alt: "avatar" },
  firstname,
  lastname,
  email,
  phone = "",
  type = "teacher",
}) => {
  return (
    <div className="user">
      <img className="user__img" src={image.src} alt={image.alt} />
      <div className="user__info">
        <div className="user__type">
          <b>
            {firstname} {lastname}
          </b>
          <Badge type={type} />
        </div>

        <span>{email}</span>
        <span>{phone}</span>
      </div>
    </div>
  );
};
