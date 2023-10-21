import React, { useEffect, useState } from "react";
import { TextField } from "@mui/material";
import Autocomplete from "@mui/material/Autocomplete";
import { fetchAllSubjects, fetchAllUsers } from "./search";

interface IUser {
  id: number;
  firstName: string;
  lastName: string;
}

interface ISubject {
  id: number;
  name: string;
}

interface ISearchProps {
  type: "users" | "subjects";
  width?: string;
}

export const Search: React.FC<ISearchProps> = ({ type, width }) => {
  const [value, setValue] = useState<IUser | ISubject | null>(null);
  const [inputValue, setInputValue] = useState<string>("");
  const [options, setOptions] = useState<ReadonlyArray<IUser | ISubject>>([]);
  const [promise, setPromise] = useState<Promise<any> | null>(null);

  useEffect(() => {
    if (type === "users") {
      if (promise === null) {
        setPromise(fetchAllUsers());
      }
      if (inputValue.length > 1) {
        promise
          ?.then?.((data) => {
            const usersFiltered = data["hydra:member"]
              .filter((user: IUser) => {
                const { firstName, lastName } = user;
                const inputWords = inputValue.toLowerCase().split(" ");
                if (inputWords.length === 1) {
                  return (
                    firstName.toLowerCase().startsWith(inputWords[0]) ||
                    lastName.toLowerCase().startsWith(inputWords[0])
                  );
                } else if (inputWords.length >= 2) {
                  const firstNameInput = inputWords[0];
                  const lastNameInput = inputWords.slice(1).join(" ");
                  return (
                    firstName.toLowerCase().startsWith(firstNameInput) &&
                    lastName.toLowerCase().startsWith(lastNameInput)
                  );
                }
                return false;
              })
              .map((user: IUser) => ({
                id: user.id,
                firstName: user.firstName,
                lastName: user.lastName,
              }));
            setOptions(usersFiltered);
          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        setOptions([]);
      }
    } else if (type === "subjects") {
      if (promise === null) {
        setPromise(fetchAllSubjects());
      }
      if (inputValue.length > 0) {
        promise
          ?.then((data) => {
            const subjectFiltered = data["hydra:member"]
              .filter((subject: ISubject) => {
                const { name } = subject;
                return name.toLowerCase().startsWith(inputValue.toLowerCase());
              })
              .map((subject: ISubject) => ({
                id: subject.id,
                name: subject.name,
              }));
            setOptions(subjectFiltered);
          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        setOptions([]);
      }
    }
  }, [inputValue]);

  return (
    <Autocomplete
      id="combo-box-demo"
      sx={{ width: width ?? 300 }}
      filterOptions={(x) => x}
      options={options}
      autoComplete={true}
      includeInputInList
      filterSelectedOptions
      value={value}
      noOptionsText={type === "users" ? "Aucun enseignant" : "Aucune matière"}
      onInputChange={(_, newInputValue) => {
        setInputValue(newInputValue);
      }}
      onChange={(_, newValue) => {
        setOptions(newValue !== null ? [newValue, ...options] : options);
        setValue(newValue);
      }}
      renderInput={(params) => (
        <TextField
          {...params}
          label={type === "users" ? "Enseignants" : "Matières"}
          fullWidth
        />
      )}
      getOptionLabel={(option) => {
        if (type === "users") {
          return `${(option as IUser).firstName} ${(option as IUser).lastName}`;
        } else {
          return (option as ISubject).name;
        }
      }}
      renderOption={(props, option) => {
        return (
          <li {...props}>
            {type === "users"
              ? `${(option as IUser).firstName} ${(option as IUser).lastName}`
              : (option as ISubject).name}
          </li>
        );
      }}
    />
  );
};
