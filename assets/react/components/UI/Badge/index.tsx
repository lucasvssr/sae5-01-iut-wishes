import React, { useEffect, useState } from "react";

export interface IBadgeProps {
  type: "teacher" | "tempWorker" | "admin";
}

export const Badge: React.FC<React.PropsWithChildren<IBadgeProps>> = ({
  type,
}) => {
  const [badge, setBadge] = useState<{ name: string; class: string }>({
    name: "",
    class: "",
  });

  useEffect(() => {
    switch (type) {
      case "teacher":
        setBadge({
          name: "Enseignant",
          class: "badge_green",
        });
        break;
      case "tempWorker":
        setBadge({
          name: "Vacataire",
          class: "badge_blue",
        });
        break;
      case "admin":
        setBadge({
          name: "Admin",
          class: "badge_red",
        });
        break;

      default:
        break;
    }
  }, [type]);

  return <div className={`badge ${badge.class}`}>{badge.name}</div>;
};
