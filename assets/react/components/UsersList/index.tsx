import * as React from "react";
import { User } from "../UI/User";
import Grid from "@mui/material/Grid";

export interface IUsersListProps {
  users: Array<{
    id: number;
    image?: { src: string; alt: string };
    firstname: string;
    lastname: string;
    email: string;
    phone?: string;
    type?: "teacher" | "tempWorker" | "admin";
  }>;
}

export const UsersList: React.FC<IUsersListProps> = ({ users }) => {
  return (
    <Grid
      container
      spacing={{ xs: 2, md: 3 }}
      columns={{ xs: 4, sm: 8, md: 12 }}
    >
      {users.map(({ id, image, firstname, lastname, email, phone, type }) => {
        return (
          <Grid item xs={2} sm={4} md={4} key={id}>
            <User
              image={image}
              firstname={firstname}
              lastname={lastname}
              email={email}
              phone={phone}
              type={type}
            />
          </Grid>
        );
      })}
    </Grid>
  );
};
